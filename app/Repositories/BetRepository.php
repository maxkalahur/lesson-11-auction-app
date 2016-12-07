<?php

namespace App\Repositories;

use App\Database\DB;

class BetRepository
{
    protected $db;

  public function __construct()
  {
      $this->db=DB::getDb();
  }

  public static function allBets($lotID)
  {
     return  DB::select("SELECT b.id, b.price, b.lot_id, u.name, b.created_at 
                        FROM `bets` as b
                        LEFT JOIN users as u
                        ON u.id = b.user_id
                        WHERE `lot_id`='{$lotID}'
                        ORDER BY `price` DESC");
  }
  public static function lastBet($lotID, $bet)
  {
     return  DB::select("SELECT * FROM `bets` 
                         WHERE (`lot_id`='{$lotID}' AND `price`<'$bet')");
  }
  public static function userBet($lotID, $user)
  {
      DB::select("SELECT * FROM `bets` 
                  WHERE (`user_id`='{$user}' AND `lot_id`='{$lotID}')");
  }
}