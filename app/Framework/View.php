<?php
namespace App\Framework;

class View
{
public static function show( $templateName, $data = [] ) {
    include "app/Views/header.html.php";
try {
include 'app/Views/'.$templateName.'.html.php';
}
catch( Exception $e ) {
echo $e->getMessage();
}

}
}