<?php

namespace Controllers\Customer;

use Controllers\BaseController;
use Models\CategoryModel;
use Models\ProductModel;
use Sysgem\Session;


class CustomerController extends BaseController
{

	private $category;
	private $product;

	public function __construct()
	{
		$this->category = new CategoryModel();
		$this->product = new ProductModel();
	}

	public function index()
	{
		$obj = $this->category->getTable();
		$objs = $this->product->getTable();
		$category = json_decode(json_encode($obj));
		$products = json_decode(json_encode($objs));
		$this->renderBlade('customer.index', [
			'categories' => $category,
			'product' => $products
		]);
	}

	public function cat_id($id)
	{
		$obj = $this->category->getTable();
		$objs = $this->product->cat_id($id);
		$category = json_decode(json_encode($obj));
		$products = json_decode(json_encode($objs));
		$this->renderBlade('customer.index', [
			'product' => $products,
			'categories' => $category
		]);
	}

	public function detail($id)
	{
		$obj = $this->product->detail($id);
		$rows = json_decode(json_encode($obj));
		$this->renderBlade('customer.detail', [
			'row' => $rows
		]);
	}
}