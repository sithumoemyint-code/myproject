@extends('layout.master')

@section('title', 'Category Edit')

@section('content')

<div class="container cat-list mt-5 mb-5">
	<h1>Category Edit</h1>

	<div class="inner-new">


		@if(\Sysgem\Session::has('errors'))
			@foreach(\Sysgem\Session::getAndRemove('errors') as $value)
				<p class="text-danger">{{ $value['message'] }}</p>
			@endforeach
		@endif


		<form method="post" enctype="multipart/form-data" action="product-add" autocomplete="off">
			<label for="title">Product Name</label>
			<input type="text" name="title" id="title" class="form-control">

			<label for="price">Price </label>
			<input type="number" name="price" id="price" class="form-control">

			<div class="form-group">
			    <label for="categories">Example select</label>
			    <select class="form-control" id="categories" name="category_id">
			    	<option value="0">-- Choose --</option>
				    	@foreach ($categories as $category)
				    		<option value="{{ $category['id'] }}">
				    			{{ $category['name'] }}
				    		</option>
				    	@endforeach
			    </select>
			 </div>

			<label for="des">Destruction</label>
			<textarea class="form-control" name="des" id="des" rows="6"></textarea>

			<div class="form-group">
			    <label for="file">Example file input</label>
			    <input type="file" class="form-control-file" id="file" name="file">
			</div>

			<div class="row no-gutters justify-content-end">
				<button type="submit" name="submit" class="btn btn-primary">Post</button>
			</div>
		</form>
	</div>
</div>



@endsection