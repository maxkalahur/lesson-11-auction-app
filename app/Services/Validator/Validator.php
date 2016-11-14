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
        $errors=[];
        foreach ($validation_data as $key => $rules) {
            if (!empty($rules)) {
                foreach ($rules as $rule) {
                    if ( !$this->$rule($data[$key]))
                        $errors["$key: $rule"] = $this->$rule($data[$key]);
                }
            }
        }
         return (empty($errors))? true :  $errors;
        }

}

