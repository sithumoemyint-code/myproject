@extends('layout.home')

@section('title', 'Detail')

@section('content')

<div class="container cat-list mt-5 mb-5">
	<h1>Product Detail</h1>

	<div class="inner-list productDetail">
		<h5>{{ $row->title }}</h5>
		<i>${{ $row->price }}</i>
		<br><br>


		<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $row->file; ?>" style='max-width:650px; max-height: 400px;' alt="">
		<br><br>
		<p>{{ $row->des }}</p>

		<a href="{{ $baseur }}/index" class="new">Back</a>
	</div>

</div>


@endsection