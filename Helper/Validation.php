<?php

namespace Helper;

use Models\MemberModel;

class Validation
{
	private $error = false;
	private $errorArr = [];

	public function __construct($rules, $data){
		foreach ($data as $key => $value) {

			$rulesArr = explode('|', $rules[$key]);
			foreach ($rulesArr as $rule) {
				if ($rule == 'required') {
					$this->requiredCheck($key, $value);
				}

				if ($rule == 'email') {
					$this->emailCheck($key, $value);
				}

				if (strpos($rule, 'email_exist') !== false) {
					$this->emailExist($key, $value, $rule);
				}

				if (strpos($rule, 'minlength') !== false) {
					$this->minlengthCheck($key, $value, $rule);
				}
			}
		}
	}


	public function minlengthCheck($key, $value, $rule){
		$minlen = explode('=', $rule)[1];
		if ( strlen($value) <= $minlen) {
			$this->error = true;
			array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' should be greater than ' . $minlen]);
		}
	}

	public function emailExist($key, $value, $rule){
		$tablename = explode('=', $rule)[1];
		$res = (new MemberModel())->getUserEmail($value);
		if ($res != false) {
			$this->error = true;
			array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is already exist']);
		}
	}

	public function emailCheck($key, $value){
		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
			$this->error = true;
			array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is invalide email.']);
		}
	}

	public function requiredCheck($key, $value){
		if (empty($value)) {
			$this->error = true;
			array_push($this->errorArr, ['value' => $value, 'key' => $key, 'message' => $key . ' is required.']);
		}
	}

	public function getError(){
		return $this->errorArr;
	}	

	public function hasError(){
		return $this->error;
	}
}