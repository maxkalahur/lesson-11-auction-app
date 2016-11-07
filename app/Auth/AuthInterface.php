<?php

namespace App\Auth;

use App\Models\User;

interface AuthInterface
{
    public static function login( User $user );
    public static function register( User $user );

    public static function getLoggedUser();

}