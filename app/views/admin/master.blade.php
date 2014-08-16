<!DOCTYPE HTML>
<html>
<head>
	<title>Admin - eCommerce Auction Webstore</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/grid.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/jquery.datetimepicker.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style-admin.css') }}">

</head>
<body>


<div class="row">

	<!-- Menu -->
	<div id="admin-sidebar-container">
		<ul class="menu">
			<li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ URL::to('admin'); }}" class=""><span class="fa fa-dashboard"></span> Home</a></li>
			<li class="{{ $active == 'products' ? 'active' : '' }} has-children">
				<a href="{{ URL::to('admin/products'); }}" class=""><span class="fa fa-shopping-cart"></span> Products</a>
				<ul class="menu sub-menu">
					<li><a href="{{ URL::to('admin/product') }}">Add Product</a></li>
					<li><a href="{{ URL::to('admin/products') }}">Products list</a></li>
				</ul>
			</li>
			<li class="{{ $active == 'auction' ? 'active' : '' }}">
				<a href="{{ URL::to('admin/auction'); }}" class=""><span class="fa fa-legal"></span> Auction</a>
			</li>
			<li class="{{ $active == 'blog' ? 'active' : '' }} has-children">
				<a href="#" class=""><span class="fa fa-pencil"></span> Blog</a>
				<ul class="menu sub-menu">
					<li><a href="{{ URL::to('admin/newpost') }}">Add New Post</a></li>
					<li><a href="{{ URL::to('admin/posts') }}">Posts list</a></li>
				</ul>
			</li>
			<li class="{{ $active == 'users' ? 'active' : '' }} has-children">
				<a href="#" class=""><span class="fa fa-users"></span> Users</a>
				<ul class="menu sub-menu">
					<li><a href="{{ URL::to('admin/newuser') }}">Add New User</a></li>
					<li><a href="{{ URL::to('admin/users') }}">Users list</a></li>
				</ul>
			</li>
		</ul>
	</div> <!-- /admin-sidebar-container -->

	<!-- Content -->
	<div id="admin-main-content-container">

		<div id="admin-top-menu">

			<div class="row">
				<div class="float_left">
					<div class="title"><span class="fa {{ $title_icon }}"></span>{{ $title }}</div>
				</div>

				<div class="float_right">
					<div id="login-menu">
						<a href="#">artemdemo</a>

					</div>
				</div>
			</div>

		</div> <!-- /admin-top-menu -->

		<div class="content">
			@if( Session::has('message') && Session::get('message') != 'false' )
				<div class="alert alert-success">
				{{Session::get('message')}}
				</div>
			@endif

			@yield('content')

		</div> <!-- /content -->

	</div> <!-- /admin-main-content-container -->

</div> <!-- /row -->



	



	<!-- Footer -->
	<div id="footer">
		<div class="container">

			<div class="row">

				<div class="col-1-4">
				</div>

				<div class="col-1-4">
				</div>

				<div class="col-1-4">
				</div>

				<div class="col-1-4">
				</div>

			</div> <!-- /row -->

		</div> <!-- /container -->
	</div>


	<script src="{{ URL::to('js/jquery.min.js') }}"></script>
	<script src="{{ URL::to('js/jquery-ui.min.js') }}"></script>
	<script src="{{ URL::to('js/jquery.datetimepicker.js') }}"></script>

	<script src="{{ URL::to('js/admin-scripts.js') }}"></script>

</body>
</html>