@extends('layout.master')

@section('title', 'Category')

@section('content')


<div class="container cat-list mt-5 mb-5">
	<h1>New Category</h1>

	<div class="inner-new">
		<form action="cat-add" method="post" autocomplete="off">

			<label for="name">Category Name</label>
			<input type="text" name="name" id="name" class="form-control">

			<label for="remark">Remark</label>
			<textarea class="form-control" name="remark" id="remark" rows="3"></textarea>


			<br>
			<button type="submit" class="btn btn-primary">Post</button>
		</form>
	</div>
	
</div>

@endsection