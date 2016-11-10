<?php

namespace App\Database;

use App\Database\DatabaseInterface;
use \PDOException;
use \PDO as PDO;

class DB implements DatabaseInterface
{
	protected $host = '';
	protected $user = '';
	protected $pass = '';
	protected $db = '';
	protected static $instance;
	protected $pdo;

	public static function init( $host, $user, $pass, $db ) {

		if( self::$instance ) return self::$instance;
		
		try {
            $instance = new DB;
            $instance->pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8mb4", $user, $pass);
            $instance->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $instance->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$instance = $instance;
        }
		catch (PDOException $e) {
            echo $e->getMessage();
        }
		
		return self::$instance;
	}
	
	private function __construct() {
		
	}

    public static function select( String $query, Array $args = [] ) {

        $db = self::$instance;
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($args);

        return $stmt->fetchAll();
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