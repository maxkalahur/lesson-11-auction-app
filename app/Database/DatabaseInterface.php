<?php

namespace App\Database;

interface DatabaseInterface
{
	public function select( String $query, Array $args = [] );
	public function delete( String $query, Array $args = [] );
	public function update( String $query, Array $args = [] );
	public function insert( String $query, Array $args = [] );
	
	public function checkConnection();
	
}