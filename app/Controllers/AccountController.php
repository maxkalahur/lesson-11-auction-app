<?php
namespace App\Controllers;

use App\Auth\Auth;
use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\View;
use App\Models\Lot;
use App\Models\User;
use App\Services\UploadsManager\UploadsManager;



class AccountController extends Controller
{
    public static function index()
    {
        $checkId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        if ($checkId){
            User::get($checkId);
            $user = User::get($checkId)[0];

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
            View::show('account',$infoArray);
        }
        else header('location: /login');
    }

    public function createLot()
    {
        $infoLot = isset($_POST['lot']) ? $_POST['lot'] : null;

        if ($infoLot){
            // Create and set lot params
            $newLot =  new Lot();
            $newLot->setName($infoLot['name']);
            $newLot->setMerchant_id($_SESSION['user_id']);
            $newLot->setDescription($infoLot['description']);
            $newLot->setCategory_id($infoLot['category_id']);
            $newLot->setCategory_id($infoLot['category_id']);

            // Define time to finish
            $currentTime = time();
            $lotTime = $infoLot['time'];

            if ($lotTime = 'month'){
                $addTime = date('Y-m-d H:i:s', strtotime('+1 month', $currentTime));
                $newLot->setTime_finish($addTime);
            }
            else {
                $addTimeValue = "+$lotTime day";
                $addTime = date('Y-m-d H:i:s', strtotime($addTimeValue, $currentTime));
                $newLot->setTime_finish($addTime);
            }
            // Save photo path and name

            $image = isset($_FILES['lot_image']) ? $_FILES['lot_image'] : null;

                if ($image['name']){
                    $uploadsManager = $this->servicesContainer->uploadsManager;
                    $fileName = $uploadsManager->saveLotImage($_FILES['lot_image']);
                    $newLot->setImage($fileName);
                }

            $newLot->save();
            header('location: /account');
        }

        $infoCategory = DB::select('SELECT * FROM `categories`');
        View::show('create-lot',$infoCategory);
    }
}