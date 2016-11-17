<?php

namespace App\Models;

use App\Models\Model;

class LotPhoto extends Model
{
  protected $table='photos';
    public $lot_id, $name;
}