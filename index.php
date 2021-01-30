<?php

require 'vendor/autoload.php';
require 'init.php';


use Controllers\Admin\AdminHomeController;
use Controllers\Admin\AdminRegisterController;
use Controllers\Admin\AdminPostController;
use Controllers\HomeController;


$adminHomeController = new AdminHomeController();
$adminRegisterController = new AdminRegisterController();
$homeController = new HomeController();
$adminPostController = new AdminPostController();


$action = isset($_GET['action'])? $_GET['action'] : '';
$method = isset($_GET['method'])? $_GET['method'] : '';
$method1 = isset($_GET['method1'])? $_GET['method1'] : '';

$id = '';

switch ($action) {
	case '':
		$homeController->index();
		break;


	case 'admin':
		if ($method == '') {
			$adminHomeController->index();
		}else if ($method == 'cat-list') {
			$adminHomeController->catList();
		}else if ($method == 'cat-new'){
			$adminHomeController->catNew();
		}else if ($method == 'cat-new') {
			$adminPostController->cat_new();
		}else if ($method == 'login') {
			$adminRegisterController->login();
		}else if ($method == 'register') {
			$adminRegisterController->register();
		}else if ($method == 'registerInsert') {
			$adminRegisterController->regInsert();
		}else if ($method == 'loginMember') {
			$adminRegisterController->loginMember();
		}else if ($method == 'logout') {
			$adminRegisterController->logout();
		}else if ($method == 'cat-add') {
			$adminPostController->cat_add();
		}else if ($method == 'cat-del') {
			$adminPostController->cat_del($id);
		}else{
			echo '404 not found';
		}
		break;
				
	default:
		echo '404 not found';
		break;
}
