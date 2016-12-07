<?php

namespace App\Models;

use App\Models\Model;

class Catalog extends Model
{
    protected $table='categories';
    public $id, $name, $parent;
}