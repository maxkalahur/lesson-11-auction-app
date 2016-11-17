<?php

namespace App\Controllers;

use App\Models\Lot;
use App\Models\LotPhoto;
use App\Controllers\Controller;
use App\Framework\View;

class LotController
{
    public function showLot(){
        View::show("lot",['lot'=>Lot::all()]);
    }
    public function withCategory(){
        $arr=[];
        if(isset($_GET['category_id'])) {
            $arr_obj = Lot::getBYparametr($_GET['category_id'], 'category_id');
            if (!empty($arr_obj) && is_array($arr_obj)) {
                $arr = ['category_lots' => $arr_obj];
            } else {
                $arr = ['category_lots' => ['0' => $arr_obj]];
            }
        }
        if(isset($_GET['lot_id'])){
            $arr_obj = Lot::getBYparametr($_GET['lot_id'], 'id');
            $arr_scr=LotPhoto::getBYparametr($_GET['lot_id'], 'lot_id');
            if (!empty($arr_obj) && is_array($arr_obj)) {
                $arr = ['lot_page' => $arr_obj];
            } else {
                $arr = ['lot_page' => ['0' => $arr_obj]];
            }
        }
        View::show("lot", $arr);
    }
}