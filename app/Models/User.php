<?php
namespace App\Models;

use App\Models\Model;
use App\Models\Lot;


class User extends Model
{
	protected $table = 'users';
	protected $id, $name, $email, $password;
	
	public function lots() {
	    return Lot::getByUserId( $this->id );
    }
	
}