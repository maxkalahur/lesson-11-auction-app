<?php
namespace App\Auth;

use \Exception;

use App\Models\User;

class Auth implements AuthInterface
{

    private static $user;

    public static function login( Array $credentials ){
        $credentials['email'];
        $credentials['pass'];

        // DB select
        $res = '';

        if( $res == 1 ) {
            self::$user = User::get($res['id']);
        }

    }
    public static function logout(){

    }
    public static function register( User $user ){

        $user->save();
    }

    public static function getLoggedUser(){
        return self::$user;
    }

}