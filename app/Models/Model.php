<?php

use App\Models\ModelInterface;
use App\Database\DB;

namespace App\Models;

abstract class Model implements ModelInterface
{
	protected $table;
	
	public function __construct($data = null) {
		
		if( is_int($data) ) {
			return self::get($data);
		}
		else if( is_array ($data) ) {
			return self::hydrate($data);
		}
		
		return $this;
	}
	
	static public function all(): Array {
		
		return DB::select("SELECT * FROM $table");
	}
	static public function get(Int $id): Array {
		
		return DB::select("SELECT * FROM $table WHERE `id`=$id");
	}
	static public function hydrate(Array $data): Model {
		
		
	}
	
	
	
}