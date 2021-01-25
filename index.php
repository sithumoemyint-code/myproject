<?php

require 'vendor/autoload.php';
require 'init.php';


use Controllers\Admin\AdminHomeController;
use Controllers\Admin\AdminRegisterController;
use Controllers\HomeController;


$adminHomeController = new AdminHomeController();
$adminRegisterController = new AdminRegisterController();
$homeController = new HomeController();


$action = isset($_GET['action'])? $_GET['action'] : '';
$method = isset($_GET['method'])? $_GET['method'] : '';
$method1 = isset($_GET['method1'])? $_GET['method1'] : '';

switch ($action) {
	case '':
		$homeController->index();
		break;


	case 'admin':
		if ($method == '') {
			$adminHomeController->index();
		}else if ($method == 'adminRegisterLogin') {
			if ($method1 == 'login') {
				$adminRegisterController->login();
			}else if ($method1 == 'register') {
				$adminRegisterController->register();
			}else if ($method1 == 'registerInsert') {
				$adminRegisterController->regInsert();
			}else if ($method1 == 'loginMember') {
				$adminRegisterController->loginMember();
			}else if ($method1 == 'logout') {
				$adminRegisterController->logout();
			}else{
				echo '404 not found';
			}	
		}else{
			echo '404 not found';
		}
		break;
				
	default:
		echo '404 not found';
		break;
}
