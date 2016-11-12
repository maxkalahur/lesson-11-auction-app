<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\Validator\Validator;
use App\Auth\Auth;

class AuthController extends Controller
{
    public static function login()
    {
        $postForm = isset($_POST['login']) ? $_POST['login'] : null;
            if ($postForm){
                if (Auth::login($postForm)){
                    if (isset($postForm['rememberMe'])){
                        setcookie('password', md5($postForm['pass']), time()+9999999 );
                    }

                    header('location: /account');
                }
            }
        include "app/Views/header.html.php";
        include "app/Views/login.html.php";
    }
    public static function registration()
    {

        $postForm = isset($_POST['reg']) ? $_POST['reg'] : null;
        if ($postForm){
            $user = new User();
            $user->setName('name2');
            $user->setEmail('ler@mail.ru');
            $user->setPassword('56544545561');
            var_dump($user);
            Auth::register($user);
        }
        include "app/Views/header.html.php";
        include "app/Views/registration.html.php";
    }
}