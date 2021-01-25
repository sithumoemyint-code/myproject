<?php

namespace Models;


class MemberModel extends BaseModel
{

	public function getTable()
	{
		$sql = "SELECT * FROM member";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}


	public function insert($name, $email, $password)
	{
		$password = $this->encodePass($password);

		$sql = "SELECT * FROM member WHERE email = '$email'";
		$result = $this->mysqli->query($sql);

		if (mysqli_num_rows($result) > 0) {
			return "User already in use!";
		}else {
			$sql = "INSERT INTO member(name, email, password, created_at, updated_at) VALUES ('$name', '$email', '$password', now(), now())";

			if ($this->mysqli->query($sql)) {
				return true;
			}else {
				echo 'error';
			}
		}		
	}

	public function getUserEmail($email)
	{
		$sql = "SELECT * FROM member WHERE email='$email'";
		$result = $this->mysqli->query($sql);
		$row = $result->fetch_assoc();
		if (empty($row)) {
			return false;
		}else {
			return $row;
		}
	}

	public function login($email, $password)
	{
		$sql = "SELECT * FROM member WHERE email='$email' AND password='$password'";
		$result = $this->mysqli->query($sql);

		if (mysqli_num_rows($result) == 1) {
			return true;
		}else {
			return false;
		}
	}


	public function encodePass($pass)
	{
		$pass = md5($pass);
		$pass = sha1($pass);
		$pass = crypt($pass, $pass);

		return $pass;
	}
}