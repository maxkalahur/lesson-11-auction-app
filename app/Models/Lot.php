<?php

namespace App\Models;

use App\Models\Model;

class Lot extends  Model
{
    protected $table="lots";
    public $id, $buyer_id, $merchant_id, $category_id, $description, $time_finish, $rate, $name, $image;

    public function imagePath(){
        return "/images/lots/$this->image";
    }
    public function shortImagePath(){
        $extension_pos = strrpos($this->image, '.'); // find position of the last dot, so where the extension starts
        $thumb = substr($this->image, 0, $extension_pos) . '_150x150' . substr($this->image, $extension_pos);
        return $thumb;
    }
}