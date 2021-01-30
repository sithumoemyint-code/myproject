<?php

// namespace Sysgem;

// use Models\CategoryModel;
// use Sysgem\Session;


// class Validation
// {
// 	private $categoryModel;

// 	public function __construct()
// 	{
// 		$this->categoryModel = new CategoryModel();
// 	}

// 	public function validationInsert($name, $remark)
// 	{
// 		if ($this->catName($name) AND $this->catRemark($remark)) {
// 			return $this->categoryModel->insert($name, $remark);
// 		}else {
// 			echo 'fuck';
// 		}
// 	}

// 	public function catName($name)
// 	{
// 		if (strlen($name) == "") {
// 			return false;
// 		}else {
// 			return true;
// 		}
// 	}

// 	public function catRemark($remark)
// 	{
// 		if (strlen($name) == "") {
// 			return false;
// 		}else {
// 			return true;
// 		}
// 	}
// }
