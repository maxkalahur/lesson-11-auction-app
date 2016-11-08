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

	    $model = new static;
	    return $model->hydrate(DB::select("SELECT * FROM $model->table"));
	}

	public static function get(Int $id) {

        $model = new static;
		return $model->hydrate(DB::select("SELECT * FROM $model->table WHERE `id`=$id"));
	}

	public function hydrate(Array $data) {

	    $res = [];
	    foreach( $data as $item ) {
            $res[] = $model = new $this;

            // mapping...
            foreach ($item as $key => $val) {

                $vars = get_object_vars($model);

                if (array_key_exists($key, $vars)) {
                    $setVarMethod = 'set' . ucfirst($key);
                    $model->$setVarMethod($val);
                }
            }
        }

        return count($res) === 1 ? $res[0] : $res ;
	}


    public function __call( $name, $args ) {
        //(User::get(1))->getEmail();

        $vars = get_object_vars($this);

        if( substr( $name, 0, 3 ) === "get" ) {
            $var = lcfirst(substr($name, 3));
            return $this->$var;
        }

        if( substr( $name, 0, 3 ) === "set" ) {
            $var = lcfirst(substr($name, 3));
            $this->$var = $args[0];
        }

    }

    public static function __callStatic( $name, $args ) {
        //User::getByEmail('a@b.c')
        $vars = get_class_vars(__CLASS__);

        //TODO...

    }
	
	
}