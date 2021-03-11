<?php

namespace Controllers\Customer;

use Controllers\BaseController;
use Models\OrderModel;


class OrderController extends BaseController
{
	private $order;

	public function __construct()
	{
		$this->order = new OrderModel;
	}

	public function order()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		$result = $this->order->insert($name, $email, $phone, $address);

		if ($result === true) {
			echo 'good to go';
		}else {
			echo 'Opps! Somthing wrong.';
		}
	}
}
