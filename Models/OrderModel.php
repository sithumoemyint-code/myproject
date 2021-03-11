<?php

namespace Models;

class OrderModel extends BaseModel
{
	public function insert($name, $email, $phone, $address)
	{
		$sql = "INSERT INTO customers (name, email, phone, address, created_at) VALUES ('$name', '$email', '$phone', '$address', now())";

		if ($this->mysqli->query($sql)) {
			return true;
		}

		$customer_id = mysqli_insert_id($this->mysqli);

        $sql = "INSERT INTO orders (customer_id, order_date, total) VALUES ('$customer_id', now(), '{$_SESSION["total"]}')";


  //       $order_id = mysqli_insert_id($this->mysqli);

		// foreach ($_SESSION['cart'] as $id => $qty) {
		// 	$sql = "INSERT INTO order_items (product_id, order_id, qty) VALUES ('$id', '$order_id', '$qty')";
		// }

		unset($_SESSION['cart']);

		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error.';
		}
	}
}