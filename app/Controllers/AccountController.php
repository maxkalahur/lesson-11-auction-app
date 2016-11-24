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
                                            LEFT JOIN users as u
                                            ON l.`buyer_id` = u.id 
                                            LEFT JOIN categories as c
                                            ON l.`category_id` = c.id
                                            WHERE merchant_id ='.$checkId);
            $infoArray['purchases'] = DB::select('SELECT l.`name`,l.`description`,l.`id`,c.name as category_id,
                                            l.`bets_id`,u.name as merchant_id,l.`time_finish`
                                            FROM `lots` as l
                                            LEFT JOIN users as u
                                            ON l.`merchant_id` = u.id 
                                            LEFT JOIN categories as c
                                            ON l.`category_id` = c.id
                                            WHERE `buyer_id` ='.$checkId);
            var_dump($infoArray);
            View::show('account',$infoArray);
        }
        else header('location: /login');
    }

    public function createLot()
    {
        $infoCategory = DB::select('SELECT * FROM `categories`');

//        $currentTime = time();//+ (7 * 24 * 60 * 60);
//        $a = date('Y-m-d H:i:s', strtotime('+1 month', $currentTime));
//        $a = date('Y-m-d H:i:s', strtotime('+1 day', $currentTime));
//        $b = date('Y-m-d H:i:s', $currentTime);
//        var_dump($a);
//        var_dump($b);

        View::show('create-lot',$infoCategory);

    }

}