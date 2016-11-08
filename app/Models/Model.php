<?php
namespace App\Models;

use App\Models\ModelInterface;
use App\Database\DB;

abstract class Model implements ModelInterface
{
	protected static $table;
	
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

        foreach( $data as $key => $val ) {
            $vars = get_object_vars($model);
            if( in_array( $key, $vars ) ) {
                $setVarMethod = 'set'.$key;
                $model->$setVarMethod = $val;
            }
        }
        // mapping...

        return $model;
	}


    public function __call( $name, $args ) {
        //(new User)->getEmail();

        $className = __CLASS__;
        $model = new $className();
        $vars = get_object_vars($model);
    }

    public static function __callStatic( $name, $args ) {
        //User::getByEmail('a@b.c')
        $vars = get_class_vars(__CLASS__);
    }
	
	
}