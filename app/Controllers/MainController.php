<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\Validator\Validator;
use App\Services\FBAuth\FBAuth;

class MainController extends Controller
{

    public function index() {

        include "app/Views/header.html.php";
        include "app/Views/main.html.php";
        $aa = new FBAuth();
        $aa->auth();
        $validation=new Validator();
        var_dump($validation->validation(['name'=>['require'],
            'email'=>['require', 'email'],
            'password'=>['require']],
            ['name'=>'vov', 'email'=>'1kaa@mail.com', 'password'=>'asdcas', 'message'=>'da asdwq wq']));

        $user = User::get(1);
        $email = $user->getEmail();

        $users = User::all();

        $user = User::getByEmail('test@.xx.xx');

        exit();
        $user = User::get(1);
        $userLots = $user->lots();

    }

}