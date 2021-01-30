<div class="container-fluid navContainer">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="{{ $baseur }}/admin">
				<img src="<?php echo URL_ROOT . 'public/asset/img/message.png' ?>" width="35" height="35" alt="">
			</a>
			

			<div class="ml-auto">
				<ul class="navbar-nav">

					<li class="nav-item active">
						<a class="nav-link" href="#">
							@if(\Sysgem\Auth::check())
								{{\Sysgem\Session::get("user_name")}}
							@endif
						</a>
					</li>	

					<li class="nav-item active">
						<a class="nav-link" href="{{ $baseur }}/admin/cat-list">Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link"  role="button" data-toggle="dropdown">
							<i class="fas fa-chevron-circle-down"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							
							@if(\Sysgem\Auth::check())
								<a class="dropdown-item" href="{{ $baseur }}/admin/logout">Logout</a>
							@else
								<a class="dropdown-item" href="{{ $baseur }}/admin/register">Register</a>
								<a class="dropdown-item" href="{{ $baseur }}/admin/login">Login</a>
							@endif

							
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>