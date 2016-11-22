<?php
namespace App\Controllers;

use App\Auth\Auth;
use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\View;
use App\Models\User;
use App\Services\Validator\Validator;


class AccountController extends Controller
{
    public static function index()
    {
        $checkId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        if ($checkId){
            User::get($checkId);
            $user = User::get($checkId);

            $infoArray = [];
            $infoArray['user']['name'] = $user->getName();
            $infoArray['user']['email'] =  $user->getEmail();
            $infoArray['user']['password'] = md5($user->getPassword());
//            echo md5($user->getPassword());
            $infoArray['lots'] = DB::select('SELECT l.`name`,l.`description`,l.`id`,c.name as category_id,
                                            l.`bets_id`,u.name as buyer_id,l.`time_finish`
                                            FROM `lots` as l
                                            INNER JOIN users as u
                                            ON l.`buyer_id` = u.id 
                                            INNER JOIN categories as c
                                            ON l.`category_id` = c.id
                                            WHERE merchant_id ='.$checkId);
            $infoArray['purchases'] = DB::select('SELECT * FROM `lots` WHERE `buyer_id` ='.$checkId);
            var_dump($infoArray);
//            $lots = DB::select('SELECT * FROM `lots` WHERE `merchant_id` ='.$checkId);
            View::show('account',$infoArray);
        }
        else header('location: /login');
    }
}