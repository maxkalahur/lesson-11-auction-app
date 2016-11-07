<?php

namespace App\Database;

use App\Database\DatabaseInterface;
use \Exception;

class DB implements DatabaseInterface
{
	protected $host = '';
	protected $user = '';
	protected $pass = '';
	protected $db = '';
	
	public static function init( $host, $user, $pass, $db ) {
		
		static $instance;
		if( $instance ) return $instance;
		
		try {
			//...connecting
            $instance = new DB;
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
		
		return $instance;
	}
	
	private function __construct() {
		
	}

    public static function select( String $query, Array $args = [] ) {

    }

    public static function delete( String $query, Array $args = [] ) {

    }

    public static function update( String $query, Array $args = [] ) {

    }

    public static function insert( String $query, Array $args = [] ) {

    }

    public static function checkConnection() {

    }

	
	
}