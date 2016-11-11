<?php
namespace App\Auth;

use \Exception;
use App\Database\DB;
use App\Models\User;

class Auth implements AuthInterface
{

    private static $user;

    public static function login( Array $credentials ){
        $credentials['email'] ;
        $credentials['pass'];

        $arguments = [$credentials['email'],$credentials['pass']];

        // DB select
        $res = DB::select("SELECT * FROM users WHERE `email` =? AND `password` = ?",$arguments);

        if($res) {
            $user = (new User())->hydrate($res);
            var_dump($user);
            $_SESSION['id'] = $res[0]['id'];
            self::$user = $user;
            var_dump($_SESSION);
        }

        var_dump(self::$user);
    }
    public static function logout(){
        unset($_SESSION[id]);
    }

    public static function register( User $user ){
        $user->save();
    }

    public static function getLoggedUser(){
        return self::$user;
    }
    public static function CheckAuthSession(){

    }
}