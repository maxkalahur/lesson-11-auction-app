<?php

namespace App\Controllers;

use App\Models\Lot;
use App\Models\Bet;
use App\Models\LotPhoto;
use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\View;

class LotController
{
    public function showLot(){
        if(isset($_GET['lot_id']))
        {
            $lot = Lot::get($_GET['lot_id']);
            $lastBet=DB::select("SELECT * FROM `bets` WHERE lot_id='{$_GET['lot_id']}'");
        }
        $maxPrice=isset($lastBet[0]['price']) ? $lastBet[0]['price'] : 0;
        if(isset($_POST['bet']) && $_POST['bet']>$maxPrice)
        {
            $bet=(int)$_POST['bet'];
            $maxPrice=$bet;
        }
        else
            {
                $bet=null;
            }
        if ($bet)
        {
            if(isset($_SESSION['user_id'])) {
                $Bet=new Bet();
                $Bet->setPrice($bet);
                $Bet->setUser_id($_SESSION['user_id']);
                $Bet->setLot_id($lot[0]->id);
                $Bet->setCreated_at(date('Y-m-d H:i:s'));
                $Bet->save();
                if(isset($lastBet[0]['id']))
                DB::delete("DELETE FROM `bets` WHERE `id`='{$lastBet[0]['id']}'");
            }
            else
            {
                header("location: /login");
                exit();
            }
        }
        View::show("lot", [
            'lot_page'=>$lot,
            'maxPrice'=>$maxPrice
        ]);
    }
}