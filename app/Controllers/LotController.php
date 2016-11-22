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
            $arr=is_array($lot) ? ['lot_page'=>$lot] : ['lot_page'=>['0'=>$lot]];
            View::show("lot", $arr);
            }
    }
    public function withCategory(){

    }
}