<?php

namespace App\Controllers;

use App\Models\Lot;
use App\Models\Bet;
use App\Models\LotPhoto;
use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\View;
use App\Services\Validator\Validator;

class LotController
{
    public function showLot(){
        $lot_id=isset($_GET['lot_id']) ? $_GET['lot_id'] : 0;
        $user=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $bet=isset($_POST['bet']) ? (int)$_POST['bet'] : 0;
        if($lot_id)
        {
            $lot = Lot::get($lot_id);
            $lastBet=DB::select("SELECT MAX(`price`) as maxBet FROM `bets` WHERE `lot_id`='{$lot_id}'");
        }
        $maxBet=isset($lastBet[0]['maxBet']) ? (int)$lastBet[0]['maxBet'] : 0;
        $bet= ($bet>$maxBet) ?  $bet : $maxBet;

        $validate=new Validator();
        $checkValid=$validate->validation(['bet'=>['numeric']],
                                            ['bet'=>$bet]);

        if($bet && $checkValid) {
            if ($user) {
                $time=date("Y-m-d H:i:s");
                $userBet=DB::select("SELECT * FROM `bets` 
                                      WHERE (`user_id`='{$user}' AND `lot_id`='{$lot_id}')");
                if($userBet){
                    DB::update("UPDATE `bets` 
                                SET `price`='{$bet}', `created_at`='{$time}'
                                WHERE(`user_id`='{$user}' AND `lot_id`='{$lot_id}')");
                }else{
                    $Bet=new Bet();
                    $Bet->setPrice($bet);
                    $Bet->setUser_id($user);
                    $Bet->setLot_id($lot_id);
                    $Bet->setCreated_at($time);
                    $Bet->save();
                }
            } else {
                header("location: /login");
                exit();
            }
        }
        View::show("lot", [
            'lot_page'=>$lot,
            'maxBet'=>$bet
        ]);
    }
}