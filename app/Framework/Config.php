<?php
namespace App\Framework;

use \Exception;

class Config
{

    private $values = [];

    public static function init() {

        static $instance;
        if( $instance ) return $instance;

        try {
            $instance = new Config;
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }

        return $instance;
    }

    private function __construct() {

        try {
            include __DIR__ . '/../config.php';
            $this->values = $config;
        }
        catch( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function get( $name ) {
        $keys = array_filter( explode('.', $name) );

        $res = null;
        for( $i = 0; $i < count($keys); $i++ ) {


            if( !$res ) {
                if (array_key_exists($keys[$i], $this->values)) {
                    $res = $this->values[$keys[$i]];
                }
//                var_dump($this->values);
            }
            else {
                if (array_key_exists($keys[$i], $res)) {
                    $res = $res[$keys[$i]];
                }
                else {
                    $res = null;
                    break;
                }
            }
        }
        return $res;
    }


}