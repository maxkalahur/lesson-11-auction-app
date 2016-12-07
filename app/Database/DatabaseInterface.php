<?php

namespace App\Database;

interface DatabaseInterface
{
	public static function select( String $query, Array $args = [] );
	public static function delete( String $query, Array $args = [] );
	public static function update( String $query, Array $args = [] );
	public static function insert( String $query, Array $args = [] );
	
	public static function checkConnection();
	
}