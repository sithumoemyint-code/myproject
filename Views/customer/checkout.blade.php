@extends('layout.home')

@section('title', 'Home')

@section('content')


@php
	$total = 0;
@endphp

<div class="container">
	<table class="table mt-5 table-bordered">
		<thead>
			<tr>
				<th class="text-center" scope="col">Product Image</th>
				<th class="text-center" scope="col">Product Title</th>
				<th class="text-center" scope="col">Quantity</th>
				<th class="text-center" scope="col">Unit Price</th>
				<th class="text-center" scope="col">Price</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach($final as $key => $fin)

			<?php $total += $fin[0]['price'] * $fin['qty'];	?>
			<tr>
				<td class="text-center"><img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $fin[0]['file']; ?>" height='120'></td>
				<td class="text-center"><?php echo $fin[0]['title']; ?></td>
				<td class="text-center">{{ $fin['qty'] }}</td>	
				<td class="text-center"><i>$ <?php echo $fin[0]['price']; ?></i></td>
				<td class="text-center"><?php echo $fin[0]['price'] * $fin['qty'] ?></i></td>
				<td class="text-center"><a href="{{ $baseur }}/clear?id=<?php echo $key; ?>"><i class="fa fa-trash text-danger"></i></a></td>
			</tr>
			@endforeach

			<tr>
				<td colspan="5" align="right"><b>Total:</b></td>
				<td>$<?php echo $total; ?></td>
			</tr>

		</tbody>
	</table>

	<div class="order-form">
		<h2>Order Now</h2>

		<form action="order" method="post">
			<label for="name">Your Name</label>
			<input type="text" name="name" id="name">

			<label for="email">Email</label>
			<input type="text" name="email" id="email">

			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone">

			<label for="address">Address</label>
			<textarea name="address" id="address"></textarea>

			<br><br>
			<input type="submit" value="Submit Order">
			<a href="{{ $baseur }}/index">Continue Shopping</a>
		</form>
	</div>


</div>


@endsection