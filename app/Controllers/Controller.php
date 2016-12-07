<?php
namespace App\Controllers;

abstract class Controller
{
    protected $servicesContainer;
    protected $db;
    protected $config;

    public function __construct( $config, $db, $servicesContainer ) {

        $this->db = $db;
        $this->config = $config;
        $this->servicesContainer = $servicesContainer;


    }

}