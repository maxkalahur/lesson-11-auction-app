<?php
namespace App\Auth;

use \Exception;

use App\Models\User;

class Auth implements AuthInterface
{

    private static $user;

    public static function login( User $user ){

    }
    public static function register( User $user ){

    }

    public static function getLoggedUser(){
        return self::$user;
    }

}