<?php

namespace App\Auth;

use App\Models\User;

interface AuthInterface
{
    public static function login( Array $credentials );
    public static function register( User $user );

    public static function getLoggedUser();

}