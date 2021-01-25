<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\MemberModel;
use Sysgem\Session;

class AdminRegisterController extends BaseController
{
	private $memberModel;

	public function __construct()
	{
		$this->memberModel = new MemberModel();
	}

	public function login()
	{
		$this->renderBlade('admin.login');
	}

	public function register()
	{
		$this->renderBlade('admin.register');
	}


	public function regInsert()
	{
		$name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		if ($password === $confirm_password) {
			$result = $this->memberModel->insert($name, $email, $password);

			if ($result === true) {
				Session::flash('register_success', 'Register Successfull. How do you do, Admin.');
				header('location: ' . $this->baseurl . '/admin/adminRegisterLogin/login');
			}else {
				Session::flash('email_exist', 'Email already in use');
				header('location: ' . $this->baseurl . '/admin/adminRegisterLogin/register');
			}	
		}else {
			Session::flash("error_message", "Password do not match. Please check your password.");
			header('location: ' . $this->baseurl . '/admin/adminRegisterLogin/register');
		}
	}

	public function loginMember()
	{
		// $email = $_POST['email'];
		// $password = $_POST['password'];
		// $result = $this->memberModel->login($email, $password);
		 
		$data = [
			'email' => $_POST['email'],
			'password' => $_POST['password']
		];

		$rowUser = $this->memberModel->getUserEmail($data['email']);
		if ($rowUser) {
			$hash_pass = $rowUser->password;
			if (password_verify($data['password'], $hash_pass)) {
				echo 'success';
			}else {
				echo 'fail';
			}
		}else {
			Session::flash("error_message", "failfial");
			header('location: ' . $this->baseurl . '/admin/adminRegisterLogin/login');
		}



		// Session::flash("error_message", "Worng password.Please try it again.");
		// header('location: ' . $this->baseurl . '/admin/adminRegisterLogin/login');
	}

	public function logout()
	{
		
	}
}