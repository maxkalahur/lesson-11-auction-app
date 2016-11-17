<?php

namespace App\Models;

use App\Models\Model;

class Lot extends  Model
{
    protected $table="lots";
    public $id, $buyer_id, $merchant_id, $category_id, $description, $time_finish, $rate;
}