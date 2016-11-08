<?php
namespace App\Services;


class ServicesContainer
{
    private $servicesMapping;

    public function __construct() {
        $this->servicesMapping = [
            'breadCrumbs' => 'App\Services\BreadCrumbs\BreadCrumbs',
            'emailSender' => 'App\Services\emailSender\emailSender',
            'FBAuth' => 'App\Services\FBAuth\FBAuth',
            'pagination' => 'App\Services\Pagination\Pagination',
            'uploadsManager' => 'App\Services\Uploads\UploadsManager',
            'validator' => 'App\Services\Validator\Validator',
        ];
    }

    public function __get($name) {

        if( isset( $this->servicesMapping[$name] ) ) {
            return new $this->servicesMapping[$name]();
        }
        else {
            throw new \Exception('Wrong Service Name!!');
        }
    }

}