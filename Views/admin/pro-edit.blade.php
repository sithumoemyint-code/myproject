@extends('layout.master')

@section('title', 'Product Update')

@section('content')


<div class="container cat-list mt-5 mb-5">
	<h1>Porduct Edit</h1>

	<div class="inner-new">
		<form method="post" enctype="multipart/form-data" action="product-update" autocomplete="off">
			<input type="hidden" name="id" value="{{ $row->id }}">
			
			
			<label for="title">Product Name</label>
			<input type="text" name="title" id="title" class="form-control" value="{{ $row->title }}">

			<label for="price">Price </label>
			<input type="number" name="price" id="price" class="form-control" value="{{ $row->price }}">

			<div class="form-group">
				<label for="categories">Example select</label>
				<select class="form-control" id="categories" name="category_id">
					<option value="0">-- Choose --</option>
						@foreach ($category as $categories)
							<option value="{{ $categories->id }}" <?php if($categories->id == $row->category_id) echo "selected"?>>
								{{ $categories->name }}
							</option>
						@endforeach
				</select>
			</div>

			<label for="des">Destruction</label>
			<textarea class="form-control" name="des" id="des" rows="6">{{ $row->des }}</textarea>
			<br><br>

			<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $row->file; ?>" style='max-width:550px; max-height: 600px;' alt="">

			<br><br>	

			<div class="form-group">
				<label for="file">Example file input</label>
				<input type="file" class="form-control-file" id="file" name="file">
				<input type="hidden" name="oldimg" value="{{ $row->file }}">
			</div>

			<div class="row no-gutters justify-content-end">
				<button type="submit" name="submit" class="btn btn-primary">Post</button>
			</div>
		</form>

	</div>
</div>

@endsection