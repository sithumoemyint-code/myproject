<?php

require 'vendor/autoload.php';
require 'init.php';


use Controllers\Admin\AdminHomeController;
use Controllers\Admin\AdminRegisterController;
use Controllers\HomeController;
use Middlewares\AuthCheck;
use Middlewares\AdminAuthCheck;

$action = isset($_GET['action'])? $_GET['action'] : '';
$method = isset($_GET['method'])? $_GET['method'] : '';
$method1 = isset($_GET['method1'])? $_GET['method1'] : '';

switch ($action) {
	case '':
		$homeController->index();
		break;


	case 'admin':
		if ($method == '') {
			new AdminAuthCheck();
			new AuthCheck(new AdminHomeController(), 'index');
		}else if ($method == 'adminRegisterLogin') {
			if ($method1 == 'login') {
				(new AdminRegisterController)->login();
			}else if ($method1 == 'register') {
				(new AdminRegisterController)->register();
			}else if ($method1 == 'registerInsert') {
				(new AdminRegisterController)->regInsert();
			}else if ($method1 == 'loginMember') {
				(new AdminRegisterController)->loginMember();
			}else if ($method1 == 'logout') {
				(new AdminRegisterController)->logout();
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
