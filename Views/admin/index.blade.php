@extends('layout.master')

@section('title', 'Home')

@section('content')


<div class="container">
	<table class="table table-bordered table-secondary tableCss">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Catgeory</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($product as $products)
				<tr class="table-light text-muted">
					<td class="text-center">
						<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $products->file; ?>" style='max-width:150px; max-height: 200px;' alt="">
					</td>
					<td><a href="{{ $baseur }}/admin/cat-detail?id=<?php echo $products->id ?>">{{$products->title}}</a></td>
					<td>$ <i>{{$products->price}}</i></td>
					<td>{{$products->name}}</td>
					<td class="productIcon">
						<a href="{{ $baseur }}/admin/pro-edit?id=<?php echo $products->id ?>"><i class="fa fa-edit text-warning"></i></a>
						<a href="{{ $baseur }}/admin/pro-del?id=<?php echo $products->id ?>"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
</div>


@endsection