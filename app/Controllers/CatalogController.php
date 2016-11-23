<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\Config;
use App\Models\Catalog;
use App\Framework\View;
use App\Services\Pagination\Pagination;

class CatalogController extends Controller
{
    public function index(){
        $page=isset($_GET['page']) ? $_GET['page'] : 0;
        $categoryId=isset($_GET['category_id']) ? $_GET['category_id'] : 0;
        $amountLots=DB::select("SELECT COUNT(*) FROM `lots`");
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
                if(!empty($subCategories))
                {
                    $sql="SELECT * FROM `categories` AS cat
                          LEFT JOIN `lots` AS lot ON cat.id = lot.category_id
                          WHERE cat.parent = $categoryId LIMIT " . $page * $limit . ",$limit";
                }
                else
                    {
                    $sql = "SELECT * FROM `lots` 
                          WHERE `category_id` = $categoryId LIMIT " . $page * $limit . ",$limit";
                    }
            }
        $lots[]=DB::select($sql);

        View::show("catalog", [
            'topCategories'=>$topCategories,
            'subCategories'=>$subCategories,
            'lots'=>$lots,
            'pagination'=> Pagination::generate((INT)$amountLots[0]['COUNT(*)'], $page, $limit)
        ]);
}
}