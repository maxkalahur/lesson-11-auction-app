<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12.11.16
 * Time: 15:50
 */

namespace App\Services\Validator;


interface ValidatorInterface
{
    public function validation($validation_data, $data);
    //main method validation data which get data for validation it`s first argument "$validation_data"
    //and get rules validation it`s two argument "$data" which call need method which execute validation 
}