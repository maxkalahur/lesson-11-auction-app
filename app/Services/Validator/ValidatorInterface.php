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
    /**
     * @param $validation_data  get rules validation
     * @param $data  get data for validation
     * @return mixed return false in the event of fail or true in the event of success
     */
    public function validation($validation_data, $data);
}