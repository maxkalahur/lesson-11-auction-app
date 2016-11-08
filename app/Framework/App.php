<?php
namespace App\Framework;

use App\Framework\Config;
use App\Framework\Routing;
use App\Database\DB;

class App
{
	
	public function run() {

	    if( APP_MODE === 'DEBUG' ) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }

        $config = Config::init();

        $database = DB::init(
            $config->get('db.host'),
            $config->get('db.user'),
            $config->get('db.password'),
            $config->get('db.database')
        );

        if( $routeHandler = (Routing::init())->getCurrRouteHandler() ) {

            $serviceContainer = [];

            $className = 'App\Controllers\\'. $routeHandler[0];
            $methodName = $routeHandler[1];

            $controller = new $className( $config, $database, $serviceContainer );
            $controller->$methodName();

        }
        else {
            echo '404';
        }

	}
	
}