<?php
namespace App\Models;

use App\Models\ModelInterface;
use App\Database\DB;

abstract class Model implements ModelInterface
{
	protected $table;
	
	public function __construct() {

	}
	
	public static function all() {
		
		return self::hydrate(DB::select("SELECT * FROM $table"));
	}

	public static function get(Int $id) {
		
		return self::hydrate(DB::select("SELECT * FROM $table WHERE `id`=$id"));
	}

	public static function hydrate(Array $data) {

	    $className = __CLASS__;
        $model = new $className();

        // mapping...

        return $model;
	}
	
	
	
}