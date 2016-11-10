<?php

namespace App\Services\Validator;

class Validator
{
    protected function clean($value){
        $value=trim($value);
        $value=stripcslashes($value);
        $value=strip_tags($value);
        $value=htmlspecialchars($value);

        return $value;
    }
    protected function cheek_length($value, $max, $min){
        if(strlen($value)>$max || strlen($value)==$min)
            return false;
        else{
            return true;
        }
    }
    public function validation($data=[])
    {
        if (!empty($data)) {
            foreach($data as $key=>$value) {
                if ($key == 'name') {
                    $name = $this->clean($value);
                   if(!$this->cheek_length($name, 55, 0))
                       return false;
                }
                if ($key == 'password') {
                    $password = $this->clean($value);
                    if(!$this->cheek_length($password, 24, 0)){
                        return false;
                    }
                }
                if ($key == 'email') {
                    if(!filter_var($value, FILTER_VALIDATE_EMAIL))
                    return false;
                }
                if ($key == 'message') {
                    $message = $this->clean($value);
                    if(!$this->cheek_length($message, 150, 0))
                        return false;
                }
            }
        }else{
            echo "empty";
        }
        return true;
    }
}