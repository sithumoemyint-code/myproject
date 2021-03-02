<?php

require 'vendor/autoload.php';
require 'init.php';


use Controllers\Admin\AdminHomeController;
use Controllers\Admin\AdminRegisterController;
use Controllers\Admin\AdminPostController;
use Controllers\Admin\AdminProductController;
use Controllers\Customer\CustomerController;
use Controllers\HomeController;


$adminHomeController = new AdminHomeController();
$adminRegisterController = new AdminRegisterController();
$homeController = new HomeController();
$adminPostController = new AdminPostController();
$adminProductController = new AdminProductController();
$customerController = new CustomerController();


$action = isset($_GET['action'])? $_GET['action'] : '';
$method = isset($_GET['method'])? $_GET['method'] : '';
$method1 = isset($_GET['method1'])? $_GET['method1'] : '';

$id = '';

switch ($action) {
	case 'index':
		if ($method == '') {
			$customerController->index();
		}else if ($method == 'cat') {
			$id = $_GET['id'];
			$customerController->cat_id($id);
		}else if ($method == 'detail') {
			$id = $_GET['id'];
			$customerController->detail($id);
		}else {
			echo '404';
		}
		break;

	case 'addcart': 
		$id = $_GET['id'];
		$customerController->addcart($id);
		break;

	case 'clear':
		unset($_SESSION['cart']);
		unset($_SESSION['qtys']);
		header('location: index');
		break;

	case 'checkout':
		$customerController->checkout();
		break;

	case 'admin':
		if ($method == 'index') {
			$adminHomeController->checklogin()->index();
		}else if ($method == 'cat-list') {
			$adminHomeController->checklogin()->catList();
		}else if ($method == 'cat-new'){
			$adminHomeController->checklogin()->catNew();
		}else if ($method == 'cat-edit') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->catEdit($id);
		}else if ($method == 'cat-detail') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->catDetail($id);
		}else if ($method == 'cat-new') {
			$adminPostController->checklogin()->cat_new();
		}else if ($method == 'login') {
			$adminRegisterController->login();
		}else if ($method == 'register') {
			$adminRegisterController->register();
		}else if ($method == 'registerInsert') {
			$adminRegisterController->regInsert();
		}else if ($method == 'loginMember') {
			$adminRegisterController->loginMember();
		}else if ($method == 'logout') {
			$adminRegisterController->checklogin()->logout();
		}else if ($method == 'product-update') {
			$adminProductController->checklogin()->update();
		}else if ($method == 'cat-update') {
			$adminPostController->checklogin()->cat_update();
		}else if ($method == 'cat-add') {
			$adminPostController->checklogin()->cat_add();
		}else if ($method == 'cat-del') {
			$id = $_GET['id'];
			$adminPostController->checklogin()->cat_del($id);
		}else if ($method == 'pro-del') {
			$id = $_GET['id'];
			$adminProductController->checklogin()->pro_delete($id);
		}else if($method == 'products-new') {
			$adminProductController->checklogin()->index();
		}else if ($method == 'product-add') {
			$adminProductController->checklogin()->product_add();
		}else if ($method == 'nav-form') {
			$adminProductController->checklogin()->nav_form();
		}else if ($method == 'pro-edit') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->pro_edit($id);
		}else{
			echo '404 not found';
		}
		break;
				
	default:
		echo '404 not found';
		break;
}
