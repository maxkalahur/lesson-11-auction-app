<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Category;
use App\Models\Catalog;
use App\Framework\View;

class CatalogController
{
    public function index(){
        $arr_obj=Catalog::all();
        if(!empty($arr_obj) && is_array($arr_obj)) {
          $arr=['parent_cat'=>$arr_obj];
        }else{
            $arr=['parent_cat'=>['0'=>$arr_obj]];
        }
        View::show("catalog", $arr);
}

   public function showCategory(){
       $arr_obj=Category::getBYparametr($_GET['catalog_id'], 'parent_id');
       if(!empty($arr_obj)){
           $arr=['expand_cat'=>$arr_obj];
       }else{
           $arr=['expand_cat'=>['0'=>$arr_obj]];
       }
       var_dump($arr_obj);
       View::show("catalog", $arr);
   }

}