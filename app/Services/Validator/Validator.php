<?php

namespace App\Services\Validator;

class Validator implements ValidatorInterface
{
    /*
    protected $errorMessages = [
        'email' => 'Please fill in the correct email in field %s',
        'require' => 'Please fill in %s field',
        'string' => 'Please fill in the correct string value in field %s',
        'numeric' => 'Please fill in correct number value in field %s',
    ];
    */
    
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
<<<<<<< HEAD
         return (empty($errors))? true :  $errors;
=======
        if(!in_array(false, $result))
           return true;
        else{
            var_dump(array_search(false, $result));
            return false;
        }
        
        /* 
        public function validation($validation_data, $data)
        {
            $errors = [];
            
            foreach ($validation_data as $key => $rules) {

                if( !empty($rules) ) {
                    foreach ($rules as $rule) {
                        if( !$this->$rule($data[$key]) ) {
                            $errors[$key] = [$rule => sprintf($this->errorMessages[$rule], $key)];
                        }
                    }
                }
                
            }
            
            return ( empty($errors) ) ? true : ['errors' => $errors];
>>>>>>> 7de4538f41f1c2f63eef1881419e69c6c2086986
        }
        */
        
    }

}

