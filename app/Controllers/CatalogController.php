<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Lot;
use App\Framework\View;
use App\Services\Pagination\Pagination;
use App\Database\DB;

class CatalogController extends Controller
{
    public function index(){

        $page = isset($_GET['page']) ? $_GET['page'] : 0 ;
        $limit = $this->config->get('catalog.lots_limit');
        $lotsAmount = DB::select("SELECT COUNT(*) FROM `lots`");

        $categoryId = isset($_GET['category-id']) ? $_GET['category-id'] : 0 ;

        $topCategories = Catalog::getByParent(0);
        if( !$categoryId ) {
            $lots = DB::select("SELECT * FROM `lots` LIMIT ".$page*$limit.",$limit");
        }
        else {
            $lots = DB::select("SELECT * FROM `lots` WHERE `category_id` = $categoryId LIMIT ".$page*$limit.",$limit");
            $subCategories = Catalog::getByParent($categoryId);
        }

        View::show("catalog", [
            'categories' => $topCategories,
            'subCategories' => $subCategories,
            'lots' => $lots,
            'paginator' => Pagination::generate($page, $lotsAmount, $limit)
        ]);


        $pag= new Pagination();
        $parent_cat=Catalog::getByParent(0);
        $parent_cat=is_array($parent_cat) ? $parent_cat : [$parent_cat];
        $pag->set_limit(3);
        var_dump($pag->load_page($pag->next_page()));
        var_dump($pag->load_page($pag->prev_page()));
        $all_lots=Lot::all();
        $all_lots=is_array($all_lots) ? $all_lots : [$all_lots];
        $arr=isset($_GET['Parent_id']) ? ['expand_cat'=>Catalog::getByParent($_GET['Parent_id'])] :
            (isset($_GET['Category_id']) ? ['lotsByCategory'=>Lot::getByCategory_id($_GET['Category_id'])] : false);
        if($arr){
            if(isset($arr['expand_cat'])){
                $arr=is_array($arr['expand_cat']) ? $arr['expand_cat'] : [$arr['expand_cat']];
                $arr=["expand_cat"=>$arr, "parent_cat"=>$parent_cat, "all_lots"=>$all_lots];
            } else{
                $arr=is_array($arr['lotsByCategory']) ? $arr['lotsByCategory'] : [$arr['lotsByCategory']];
                $arr=["lotsByCategory"=>$arr, "parent_cat"=>$parent_cat];
            }
        }else{
            $arr=["parent_cat"=>$parent_cat, "all_lots"=>$all_lots];
        }


        View::show("catalog", $arr);
    }
}