<?php
namespace App\Framework;

use \Exception;
use App\Auth\Auth;

class Routing
{

    private $routes = [];

    public static function init() {

        static $instance;
        if( $instance ) return $instance;

        try {
            $instance = new Routing;
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }

        return $instance;
    }

    private function __construct() {

        try {
            include __DIR__ . '/../routes.php';
            $this->routes = $routes;
        }
        catch( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function getCurrRouteHandler()
    {
        $route = ( $_SERVER['REQUEST_URI'] != '/' ) ? rtrim($_SERVER['REQUEST_URI'],'/') : '/';
        foreach ($this->routes as $routePattern => $val) {

            if( preg_match( '/^'.addcslashes($routePattern,'/').'$/', $route) ) {

                if( $this->checkPolicy( $val ) ) {
                    return $val['handler'];
                }

                return false;
            }

        }

        return false;
    }

    private function checkPolicy( $route ) {

        if( isset($route['policy']) ) {

            if( $route['policy'] == 'is_admin' ) {
                if( Auth::getLoggedUser()->is_admin !== true ) {
                    return false;
                }
            }

            if( $route['policy'] == 'is_user' ) {
                if( !Auth::getLoggedUser() ) {
                    return false;
                }
            }

        }

        return true;
    }


}