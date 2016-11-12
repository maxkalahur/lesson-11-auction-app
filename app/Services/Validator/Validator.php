<?php

namespace App\Services\Validator;

class Validator implements ValidatorInterface
{
    protected function email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;
        else {
            return false;
        }
    }

    protected function require ($data)
    {
        if (!empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    protected function string($data)
    {
        return is_string($data);
    }

    protected function numeric($data)
    {
        return is_numeric($data);
    }

    public function validation($validation_data = [], $data = [])
    {
        foreach ($validation_data as $key => $rules) {
            foreach ($rules as $rule) {
                if (in_array("require", $rules) && $this->require($data[$key])) {
                    $result["$key: $rule"]=$this->$rule($data[$key]);
                } else {
                    $result["$key: $rule"]= $this->$rule($data[$key]);
                }
            }
        }
        if(!in_array(false, $result))
           return true;
        else{
            var_dump(array_search(false, $result));
            return false;
        }
        }

}

