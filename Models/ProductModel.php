<?php

namespace Models;

class ProductModel extends BaseModel
{
	public function getTable(){
		
		$sql = "SELECT * FROM products";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}

	public function cat_id($id)
	{
		$sql = "SELECT products.*, categories.name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE category_id = '$id'";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}
	
	public function getTables(){
		$sql = "SELECT products.*, categories.name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY products.created_at DESC";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}


	public function productPost($title, $price, $category_id, $des, $file){
		
		$sql = "INSERT INTO products (title, price, category_id, des, file, created_at, updated_at) VALUES ('$title', '$price', '$category_id', '$des', '$file', now(), now())";

		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error.';
		}
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = $this->mysqli->query($sql);
		$product = $result->fetch_assoc();
		return $product;
	}

	public function detail($id)
	{
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = $this->mysqli->query($sql);
		$product = $result->fetch_assoc();
		return $product;
	}


	public function updatePost($id, $title, $price, $category_id, $des, $file)
	{
		$sql = "UPDATE products SET title='$title', price='$price', category_id='$category_id', des='$des', file='$file' WHERE id = '$id'";
		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error.';
		}
	}

	// public function searchProduct($search)
	// {
	// 	$sql = "SELECT products.*, categories.name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE title LIKE '%$search%'";
	// 	if ($this->mysqli->query($sql)) {
	// 		return true;
	// 	}else {
	// 		echo 'error.';
	// 	}
	// }

	public function delete($id)
	{
		$sql = "DELETE FROM products WHERE id = '$id'";
		
		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error. something';
		}
	}
}