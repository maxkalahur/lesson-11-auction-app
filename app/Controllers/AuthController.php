<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Models\User;
use App\Services\Validator\Validator;
use App\Auth\Auth;
use App\Framework\View;

class AuthController extends Controller
{
    public function login()
    {

        var_dump($_POST);
        $postForm = isset($_POST['login']) ? $_POST['login'] : null;
        var_dump($postForm);
            if ($postForm){
                $asr = Auth::login($postForm);
                var_dump($asr);
                if ($asr){
                    if (isset($postForm['rememberMe'])){
//                        setcookie('password', md5($postForm['pass']), time()+9999999 );
                    }

                    header('location: /account');
                    exit();
                    die();
                }
            }
        View::show('login');

////        include "app/Views/header.html.php";
//        include "app/Views/login.html.php";
    }
    public function registration()
    {
        $postForm = isset($_POST['reg']) ? $_POST['reg'] : null;
        if ($postForm){

            $user = new User();
            $user->setName($postForm['name']);
            $user->setEmail($postForm['email']);
            $user->setPassword(md5($postForm['password']));
            var_dump($user);

            $validation = new Validator();
            $validateCheck = $validation->validation(
                ['name'=>['require', 'string'],
                'email'=>['email', 'require'],
                'password'=>['require', 'string']],
                ['name'=>$postForm['name'], 'email'=>$postForm['email'], 'password'=>$postForm['password']]);
            if ($validateCheck){
                $user = new User();
                $user->setName($postForm['name']);
                $user->setEmail($postForm['email']);
                $user->setPassword(md5($postForm['password']));
                Auth::register($user);
            }

        }
        include "app/Views/header.html.php";
        include "app/Views/registration.html.php";
    }

    public function logout(){
        Auth::logout();
        header('location: /login');
    }

    public static function fbCallback()
    {
        View::show("header");
        $code = isset($_GET['code']) ? $_GET['code'] : null;
        $url = 'https://graph.facebook.com//oauth/access_token?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback&client_secret=4b5386c673b061e43ff18932023403f6&code='.$code;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        parse_str($ret, $vars);

        $accessToken =  $vars['access_token'];

        $queryUser= 'https://graph.facebook.com/me?fields=id,name,email&access_token='.$accessToken;
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, $queryUser);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        $ret2 = curl_exec($ch2);
        curl_close($ch2);
        $fbUser = json_decode($ret2);

        $newUserFb = new User();

        $argument = [$fbUser->email,$fbUser->name];
        $currentUser = DB::select("SELECT * FROM users WHERE `email` =? AND `name` =?",$argument);
        if (empty($currentUser)){

            $newUserFb->setName($fbUser->name);
            $newUserFb->setEmail($fbUser->email);
            $newUserFb->setPassword(md5(uniqid()));
            Auth::register($newUserFb);
            $_SESSION['user_id'] = DB::getlastId();
        }
        else {
            $userId = $currentUser[0];
            $_SESSION['user_id'] = $userId['id'];
        }
        header('location: /account');
    }
}
