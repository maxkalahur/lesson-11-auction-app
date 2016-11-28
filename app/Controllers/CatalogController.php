<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\Config;
use App\Models\Catalog;
use App\Framework\View;
use App\Models\Lot;
use App\Models\Model;
use App\Services\Pagination\Pagination;

class CatalogController extends Controller
{
    public function index(){

        $page=isset($_GET['page']) ? $_GET['page']-1 : 0;
        $categoryId=isset($_GET['category_id']) ? $_GET['category_id'] : 0;

        $amountLots=DB::select("SELECT COUNT(*) as amount FROM `lots`");
        $limit=$this->config->get("lotLimit");

        $topCategories=Catalog::getByParent(0);
        if(!$categoryId)
        {
            $subCategories=[];
            $sql="SELECT * FROM `lots` LIMIT ".$page*$limit.",$limit";
        }
        else
            {
                $subCategories = Catalog::getByParent($categoryId);
                $amountLots=DB::select("SELECT COUNT(*) as amount FROM `lots`
                                        WHERE `category_id` in (
                                          SELECT `id` FROM `categories`
                                          WHERE `id`=$categoryId  or parent=$categoryId)");
                $sql = "SELECT * FROM `lots` 
                        WHERE `category_id` in (
                          SELECT `id` FROM `categories`
                          WHERE `id`=$categoryId  or parent=$categoryId
                        ) 
                        LIMIT " . $page * $limit . ",$limit";
            }
        $lots=DB::select($sql);
        $objecLots = Lot::staticHydrate($lots);
//        $a = new Lot();
//        $a->imagePath();
//        var_dump($objecLots);
        View::show("catalog", [
            'topCategories'=>$topCategories,
            'subCategories'=>$subCategories,
            'lots'=>$objecLots,
            'pagination'=> Pagination::generate((INT)$amountLots[0]['amount'], $page, $limit)
        ]);
}
}
