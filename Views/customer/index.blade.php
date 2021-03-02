@extends('layout.home')

@section('title', 'Home')

@section('content')



<div class="container mt-5">

	<div class="sidebar">
		<ul class="cats">
			<li>
				<b><a href="{{ $baseur }}/index">All Categories</a></b>
			</li>
			@foreach($categories as $category)
				<li>
					<a href="{{ $baseur }}/index/cat?id=<?php echo $category->id ?>">
						{{ $category->name }}
					</a>
				</li>
			@endforeach
		</ul>
	</div>
	
	<div class="main">
		<ul class="books">
			@foreach($product as $products)
				<li>
					<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $products->file; ?>" height='150'>
					<b>
						<a href="{{ $baseur }}/index/detail?id=<?php echo $products->id ?>">{{ $products->title }}</a>
					</b>
					<i>${{ $products->price }}</i>
					<a href="#" class="add-to-cart">Add to Cart</a>
				</li>
			@endforeach
		</ul>
	</div>	
</div>


@endsection
