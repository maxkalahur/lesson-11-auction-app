<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\Validator\Validator;

use App\Framework\View;

use App\Services\FBAuth\FBAuth;


class MainController extends Controller
{

    public function index() {

          View::show("main");

        $aa = new FBAuth();
        $aa->auth();

        $validation=new Validator();
        $validation->validation(['name'=>['require', 'string'],
            'email'=>['email', 'require'],
            'password'=>['require', 'string'],
            'message'=>['string','require']],
            ['name'=>'vova', 'email'=>'1kaa@mail.com', 'password'=>'dasdas', 'message'=>'da asdwq wq']);

        $user = User::get(1);
        $email = $user->getEmail();

        $users = User::all();

        $user = User::getByEmail('test@.xx.xx');

        exit();
        $user = User::get(1);
        $userLots = $user->lots();

    }

}