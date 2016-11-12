<?php

namespace App\Services\Validator;

class Validator
{
    protected function email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;
        else {
            return false;
        }
    }

  protected function require($data){
      return is_string($data);
  }
  protected function numeric($data){
      return is_numeric($data);
  }

    public function validation($validation_data = [], $data = [])
    {
        if (!empty($data)) {
            foreach ($validation_data as $key => $rules) {
                if (isset($data[$key])) {
                    foreach ($rules as $rule) {
                      $result[]=$this->$rule($data[$key]);
                    }
                }
            }
        }
        if(in_array(false, $result))
        return false;
        else{
            return true;
        }
    }
}


