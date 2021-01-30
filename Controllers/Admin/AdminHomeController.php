<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\CategoryModel;
use Sysgem\Session;

class AdminHomeController extends BaseController
{
	private $category;

	public function __construct()
	{
		$this->category = new CategoryModel();
	}

	public function index()
	{
		$login_user = Session::get('user_id');
		$this->renderBlade('admin.index');
	}

	public function catList()
	{
		$category = $this->category->getTable();
		// $cats = json_decode(json_encode($category));
		$this->renderBlade('admin.cat-list',  ['categories' => $category]);
	}

	public function catNew()
	{
		$this->renderBlade('admin.cat-new');
	}

}