<?php
namespace App\Models;

use App\Models\Model;
use App\Models\Lot;


class User extends Model
{
	protected static $table = 'users';
	protected $id, $name, $surname, $email, $pass;
	
	public function setName( $name ) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}

	
	public function lots() {
	    return Lot::getByUserId( $this->id );
    }
	
}