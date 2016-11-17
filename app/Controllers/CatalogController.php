<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Catalog;
use App\Framework\View;

class CatalogController extends Controller
{
    public function index(){
        $arr_obj=Catalog::getBYparametr('0', 'parent');
        if(!empty($arr_obj) && is_array($arr_obj)) {
          $arr=['parent_cat'=>$arr_obj];
        }else{
            $arr=['parent_cat'=>['0'=>$arr_obj]];
        }
        View::show("catalog", $arr);
}

   public function showCategory(){
       $arr_obj=Catalog::getBYparametr($_GET['catalog_id'], 'parent');
       if(!empty($arr_obj)){
           $arr=['expand_cat'=>$arr_obj];
       }else{
           $arr=['expand_cat'=>['0'=>$arr_obj]];
       }
       View::show("catalog", $arr);
   }

}