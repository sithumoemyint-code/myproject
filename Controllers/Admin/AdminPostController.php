<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\CategoryModel;
use Sysgem\Session;

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

		$result = $this->categoryModel->insert($name, $remark);


		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/cat-list');
		}else {
			Session::flash("error_message", "Something Wrong!");
			header('location: ' . $this->baseurl . '/admin/cat-new');
		}
	}

	public function cat_del($id)
	{
		$id = $_GET['id'];
		$result = $this->categoryModel->delete($id);

		if ($result === true) {
			header('location: ' . $this->baseurl . '/admin/cat-list');
		}else {
			return 'error bro';
		}
	}

}