<?php
namespace App\Controllers;

abstract class Controller
{
    private $serviceContainer;
    private $db;
    private $config;

    public function __construct( $config, $db, $serviceContainer ) {

    }

}