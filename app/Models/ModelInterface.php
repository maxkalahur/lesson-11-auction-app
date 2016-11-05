<?php

namespace App\Models;

interface ModelInterface
{
	static public function all(): Array;
	static public function get(Int $id): Array;
	static public function hydrate(Array $data): Model;
	
	
	
}