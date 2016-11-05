<?php

use App\Models\Model;

namespace App\Models;

class User extends Model
{
	protected $table = 'users';
	protected $name;
	
	public function setName( $name ) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	
}