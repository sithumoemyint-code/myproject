<?php

namespace Helper;

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
                    $this->requiredCheck($key, $value);
                }
                if($rule == 'email'){
                    $this->emailCheck($key, $value);
                }
            }
        }
    }

    private function emailCheck($key, $value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->error = true;
            $this->errorArr = $this->errorArr + ['key' => $key, 'message' => $key . ' is invalid email'];
        }
    }

    private function requiredCheck($key, $value){
        if( empty($value) ){
            $this->error = true;
            $this->errorArr = $this->errorArr + ['key' => $key, 'message' => $key . ' is required'];
        }
    }

    public function getError(){
        return $this->errorArr;
    }

    public function hasError(){
        return $this->error;
    }
}