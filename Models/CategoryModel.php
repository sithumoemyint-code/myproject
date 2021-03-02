<?php


namespace Models;


class CategoryModel extends BaseModel
{
	public function getTable()
	{
		$sql = "SELECT * FROM categories";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}

	public function insert($name, $remark)
	{
		$sql = "INSERT INTO categories(name, remark, created_at, updated_at) VALUES ('$name', '$remark', now(), now())";
		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error.';
		}
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM categories WHERE id = '$id'";
		$result = $this->mysqli->query($sql);
		$product = $result->fetch_assoc();
		return $product;
	}

	public function update($id, $name, $remark)
	{
		$sql = "UPDATE categories SET name='$name', remark='$remark', updated_at = now() WHERE id = '$id'";
		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error.';
		}
	}

	public function delete($id)
	{
		$sql = "DELETE FROM categories WHERE id = '$id'";
		
		if ($this->mysqli->query($sql)) {
			return true;
		}else {
			echo 'error. something';
		}
	}
}