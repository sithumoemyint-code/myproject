@extends('layout.master')

@section('title', 'Register')

@section('content')

<div class="container mt-5 mb-5">
	<div class="col-md-8 offset-md-2 table-bordered loginContainer p-5">

		@if(\Sysgem\Session::has('error_message'))
			{{\Sysgem\Session::flash('error_message')}}
		@endif

		@if(\Sysgem\Session::has('email_exist'))
			{{\Sysgem\Session::flash('email_exist')}}
		@endif


		<h1 class="text-danger text-center mb-3">Register User</h1>

		<form class="form" action="registerInsert" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control rounded-0" name="username" id="username">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control rounded-0" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control rounded-0" name="password" id="password">
			</div>

			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" class="form-control rounded-0" name="confirm_password" id="confirm_password">
			</div>
			<p></p>

			<div class="row no-gutters justify-content-end">
				<button class="btn btn-info">Register</button>
			</div>
		</form>
	</div>
</div>


@endsection