@extends('layout.master')

@section('title', 'Login')

@section('content')


<div class="container mt-5">
	<div class="col-md-8 offset-md-2 table-bordered loginContainer p-5">

		@if(\Sysgem\Session::has('register_success'))
			{{\Sysgem\Session::flash('register_success')}}
		@endif


		@if(\Sysgem\Session::has('error_message'))
			{{\Sysgem\Session::flash('error_message')}}
		@endif

		@if(\Sysgem\Session::has('password_fail'))
			{{\Sysgem\Session::flash('password_fail')}}
		@endif


		<h2 class="english1 text-center mb-3">Login User</h2>

		
		<form class="form" action="loginMember" method="post">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control rounded-0" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control rounded-0" name="password" id="password">
			</div>
			<p></p>

			<div class="row no-gutters justify-content-end">
				<button class="btn btn-info">Login</button>
			</div>
		</form>
	</div>
</div>


@endsection