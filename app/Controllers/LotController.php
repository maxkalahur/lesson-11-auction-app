<?php

namespace App\Controllers;

use App\Models\Lot;
use App\Models\Bet;
use App\Models\LotPhoto;
use App\Controllers\Controller;
use App\Database\DB;
use App\Repositories\BetRepository;
use App\Framework\View;
use App\Services\ServicesContainer;

class LotController
{
    public function showLot()
    {
        $lotID=isset($_GET['lot_id']) ? $_GET['lot_id'] : 0;
        $user=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $bet=isset($_POST['bet']) ? (int)$_POST['bet'] : 0;
        if($lotID) {
            $lot = Lot::get($lotID);
            if($bet) {
                $this->makeBet($lotID, $bet, $user);
            }
            $allBets=BetRepository::allBets($lotID);
            $allBets=empty($allBets) ? ["Bet empty"] : $allBets;
        }
        View::show("lot", [
            'lot'=>$lot,
            'allBet'=>$allBets
        ]);
    }

    public function makeBet($lotID, $bet, $user)
    {
            $lastBet=BetRepository::lastBet($lotID, $bet);
            if ($user) {
                $userBet=BetRepository::userBet($lotID, $user);
                if($userBet) {
                    $Bet=Bet::staticHydrate($userBet)[0];
                    if(!empty($lastBet)) {
                        $Bet->setPrice($bet);
                        $Bet->setCreated_at(date("Y-m-d H:i:s"));
                    }
                }else{
                    $Bet=new Bet();
                    $Bet->setPrice($bet);
                    $Bet->setUser_id($user);
                    $Bet->setLot_id($lotID);
                    $Bet->setCreated_at(date("Y-m-d H:i:s"));
                }
                $Bet->save();
            } else {
                header("location: /login");
                exit();
            }
    }
}
