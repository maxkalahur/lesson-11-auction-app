<?php

namespace app\Models;

use App\Models\Model;

class Category extends Model
{
 protected $table='categories';
    public $id, $name, $parent_id;
}