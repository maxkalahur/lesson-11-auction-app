<?php

use App\Database\DatabaseInterface;

namespace App\Database;

class DB 
{
	protected $host = '';
	protected $user = '';
	protected $pass = '';
	protected $db = '';
	
	public static function init( $host, $user, $pass, $db ) {
		
		static $istance;
		if( $istance ) return $istance;
		
		try {
			//...connecting
			$istance = new DB;
		}
		catch(Exception $e) {
			
		}
		
		return $istance;
	}
	
	private function __construct() {
		
	}
	
}