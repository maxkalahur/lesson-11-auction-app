<?php

class View
{

    public static function show( $templateName, $data = [] ) {

        try {
            include '../templates/'.$templateName.'.php';
        }
        catch( Exception $e ) {
            echo $e->getMessage();
        }
        
    }


}