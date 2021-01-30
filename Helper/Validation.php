<?php

namespace Helper;

use Models\MemberModel;

class Validation {
    
    private $error = false;
    private $errorArr = [];

    public function __construct($rules, $data){
        foreach ($data as $key => $value) {
            echo $key; 
            echo ' = '; 
            echo $value; 
            echo ' need to check '; 
            echo $rules[$key];
            echo '<br>';
            
            $rulesArr = explode('|', $rules[$key]);

            echo '<pre>'; var_dump($rulesArr); echo '</pre>'; 

            foreach ($rulesArr as $rule) {
                if($rule == 'required'){
                    $required = $this->requiredCheck($key, $value);
                }
                if(!$required && $rule == 'email'){
                    $emailValid = $this->emailCheck($key, $value);
                }
                if($emailValid && strpos($rule, 'email_exist') !== false){
                    $this->emailExist($key, $value, $rule);
                }
                if(!$required && strpos($rule, 'minlength') !== false){
                    $this->minlengthCheck($key, $value, $rule);
                }                
                if(!$required && strpos($rule, 'confirm_password') !== false){
                    $this->pwconfirmCheck($key, $value, $rule);
                }
            }
        }
    }

    private function pwconfirmCheck($key, $value, $rule){
        $confirmpw = explode('=', $rule)[1];
        if($value != $confirmpw){
            $this->error = true;
            array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' should equal with confirm password']);
            return false;
        }
        return true;
    }

    private function minlengthCheck($key, $value, $rule) {
        $minlen = explode('=', $rule)[1];
        if ( strlen($value) <= $minlen ){
            $this->error = true;
            array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' should be greater than '.$minlen]);
        }        
    }

    private function emailExist($key, $value, $rule){
        $tablename = explode('=', $rule)[1];
        $res = (new MemberModel())->getUserEmail($value);
        if($res != false){
            $this->error = true;
            array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is already exist']);
        }
    }

    private function emailCheck($key, $value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->error = true;
            array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is invalid email']);
            return false;
        }
        return true;
    }

    private function requiredCheck($key, $value){
        if( empty($value) ){
            $this->error = true;
            array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is required']);
            return true;
        }
        return false;
    }

    public function getError(){
        return $this->errorArr;
    }

    public function hasError(){
        return $this->error;
    }
}