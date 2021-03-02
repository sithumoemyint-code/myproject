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

		<form action="cat-update" method="post" autocomplete="off">
			<input type="hidden" name="id" value="{{ $row->id }}">

			<label for="name">Category Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $row->name }}">

			<label for="remark">Remark</label>
			<textarea class="form-control" name="remark" id="remark" rows="3">{{ $row->remark }}</textarea>

			
			<br>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>


@endsection