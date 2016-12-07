<?php

namespace App\Repositories;

use App\Database\DB;

class LotRepository
{
    protected $db;

    public function __construct()
    {
        $this->db=DB::getDb();
    }
    public static function amountLots($categoryID)
    {
        if (!$categoryID) {
            return DB::select("SELECT COUNT(*) as amount FROM `lots`");
        } else {
            return DB::select("SELECT COUNT(*) as amount FROM `lots`
                                        WHERE `category_id` in (
                                          SELECT `id` FROM `categories`
                                          WHERE `id`=$categoryID  or parent=$categoryID)");
        }
    }
   public static function getLots($categoryID, $page, $limit)
   {
       if (!$categoryID) {
           return DB::select("SELECT * FROM `lots` LIMIT ".$page*$limit.",$limit");
       } else {
           return DB::select("SELECT * FROM `lots` 
                        WHERE `category_id` in (
                          SELECT `id` FROM `categories`
                          WHERE `id`=$categoryID  or parent=$categoryID
                        ) 
                        LIMIT " . $page * $limit . ",$limit");
       }
   }
}