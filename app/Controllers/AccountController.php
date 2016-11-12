<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\Validator\Validator;


class AccountController extends Controller
{
    public static function login()
    {
        include "app/Views/header.html.php";
        include "app/Views/account.html.php";
    }
}