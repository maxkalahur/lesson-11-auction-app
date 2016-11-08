<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;

class MainController extends Controller
{

    public function index() {
        echo 'Main Page';

        $user = new User();

        $user = User::get(1);
        $userLots = $user->lots();

        $validator = new Validator();

        $data = [
            'name' => 'Misha',
            'email' => 'a@s.x',
            'pass' => 'xxxaasd',
            'phone' => '123'
        ];

        $res = $validator->validate([
                'name' => ['required','string'],
                'email' => ['required','string'],
                'pass' => ['required']
            ],
            $data);

    }

}