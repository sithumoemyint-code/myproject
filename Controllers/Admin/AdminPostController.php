<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\CategoryModel;
use Sysgem\Session;
use Helper\Validation;

class AdminPostController extends BaseController
{
	private $categoryModel;

	public function __construct()
	{
		$this->categoryModel = new CategoryModel();	
	}

	public function cat_new()
	{
		$this->renderBlade('admin.cat-new');
	}

	public function cat_add()
	{
		$name = $_POST['name'];
		$remark = $_POST['remark'];

		$data = [
			'name' => $_POST['name'],
			'remark' => $_POST['remark']
		];

		$rules = [
			'name' => 'required',
			'remark' => 'required'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/cat-new');
			exit;
		}

		$result = $this->categoryModel->insert($name, $remark);


		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/cat-list');
		}else {
			header('location: ' . $this->baseurl . '/admin/cat-new');
		}
	}

	public function cat_update()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$remark = $_POST['remark'];

		$data = [
			'name' => $_POST['name'],
			'remark' => $_POST['remark']
		];

		$rules = [
			'name' => 'required',
			'remark' => 'required'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/cat-edit');
			exit;
		}

		$result = $this->categoryModel->update($id, $name, $remark);

		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/cat-list');
		}else {
			header('location: ' . $this->baseurl . '/admin/cat-edit');
		}
	}

	public function cat_del($id)
	{
		$result = $this->categoryModel->delete($id);

		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/cat-list');
		}else {
			return 'error bro';
		}
	}

}