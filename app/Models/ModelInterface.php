<?php

namespace App\Models;

interface ModelInterface
{
	static public function all();
	static public function get(Int $id);
	static public function hydrate(Array $data);
	
	
	
}