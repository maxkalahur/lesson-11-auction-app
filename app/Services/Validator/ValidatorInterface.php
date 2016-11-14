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
    /** Validation of data according to rules: 'require'(element exists), 'email', 'string', 'numeric'
     *
     * Example:
     * $data = ['name'=>'vova', 'email'=>'1kaa@mail.com', 'password'=>'sdadsa', 'message'=>'da asdwq wq', 'phone' =>'230992231']
     * (new Validator())->validation([
     *       'name'=>['require', 'string'],
     *       'email'=>['require', 'email'],
     *       'password'=>['require'],
     *       'phone'=>['numeric'],
     *       'message'=>['string']
     *   ], $data );
     *
     * @param $validation_data - Array of elements and rules to be validated.
     * @param $data - Array of elements to be validated
     * @return mixed return if fail - Array of errors, if success - true
     */
    public function validation($validation_data, $data);
}