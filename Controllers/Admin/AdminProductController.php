<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\CategoryModel;
use Models\ProductModel;
use Helper\Validation;
use Sysgem\Session;


class AdminProductController extends BaseController
{
	
	private $category;
	private $product;

	public function __construct(){
		$this->category = new CategoryModel();
		$this->product = new ProductModel();
	}

	public function index(){
		$category = $this->category->getTable();
		$this->renderBlade('admin.product-new', ['categories' => $category]);
	}


	public function product_add(){

		$root = dirname(dirname(dirname(__FILE__)));

		$title = $_POST['title'];
		$price = $_POST['price'];
		$category_id = $_POST['category_id'];
		$des = $_POST['des'];
		$files = $_FILES['file'];


		$data = [
			'title' => $_POST['title'],
			'des' => $_POST['des']
		];

		$rules = [
			'title' => 'minlength=1',
			'des' => 'minlength=1'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/products-new');
			exit;
		}

		if (!empty($files['name'])) {
			move_uploaded_file($files['tmp_name'], $root . '/public/asset/uploads/' . $files['name']);
			$result = $this->product->productPost($title, $price, $category_id, $des, $files['name']);

			if ($result === true) {
				header('location: ' . $this->baseurl . '/admin/index');
			}else {
				echo 'fail fail';
			}
		}
	}


	public function update(){
		$root = dirname(dirname(dirname(__FILE__)));
		$files = $_FILES['file'];
		$filename = $_FILES['file']['name'];


		$id = $_POST['id'];
		$title = $_POST['title'];
		$price = $_POST['price'];
		$category_id = $_POST['category_id'];
		$des = $_POST['des'];

		$data = [
			'title' => $_POST['title'],
			'des' => $_POST['des']
		];

		$rules = [
			'title' => 'minlength=1',
			'des' => 'minlength=1'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/pro-edit');
			exit;
		}

		if (!empty($files['name'])) {
			move_uploaded_file($files['tmp_name'], $root . '/public/asset/uploads/' . $files['name']);
		}else {
			$filename = $_POST['oldimg'];
		}

		$result = $this->product->updatePost($id, $title, $price, $category_id, $des, $filename);

		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/index');
		}else {
			echo 'hey to';
		}
	}

	// public function nav_form(){
	// 	$search = mysqli_real_escape_string($_POST['search_name']);

	// 	$result = $this->product->searchProduct($search);
	// 	if ($result === true) {
	// 		header('location: ' . $this->baseurl . '/admin/index');
	// 	}else {
	// 		echo 'error';
	// 	}
	// }
	
	public function pro_delete($id){
		$result = $this->product->delete($id);

		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/index');
		}else {
			return 'error bro';
		}
	}
}