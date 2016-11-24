<?php

namespace App\Controllers;

use App\Models\Lot;
use App\Models\LotPhoto;
use App\Controllers\Controller;
use App\Framework\View;

class LotController
{
    public function showLot(){
        if(isset($_GET['lot_id'])){
            $lot = Lot::get($_GET['lot_id']);
            View::show("lot", ['lot_page'=>$lot]);
            }
    }
    public function withCategory(){

    }
}