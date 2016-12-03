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
use App\Repositories\LotRepository;

class CatalogController extends Controller
{
    public function index(){
        $page=isset($_GET['page']) ? $_GET['page']-1 : 0;
        $categoryId=isset($_GET['category_id']) ? $_GET['category_id'] : 0;

        $amountLots=LotRepository::amountLots($categoryId);
        $limit=$this->config->get("lotLimit");
        $topCategories=Catalog::getByParent(0);
        if (!$categoryId) {
            $subCategories=[];
        } else {
                $subCategories = Catalog::getByParent($categoryId);
                $amountLots=LotRepository::amountLots($categoryId);
            }
        $lots=LotRepository::getLots($categoryId, $page, $limit);
        $objecLots = Lot::staticHydrate($lots);
        View::show("catalog", [
            'topCategories'=>$topCategories,
            'subCategories'=>$subCategories,
            'lots'=>$objecLots,
            'pagination'=> Pagination::generate((INT)$amountLots[0]['amount'], $page, $limit)
        ]);
}
}
