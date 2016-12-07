<?php

namespace App\Models;

use App\Models\Model;

class Bet extends Model
{
   protected $table="bets";
   protected $id, $user_id, $price, $created_at, $lot_id;
}