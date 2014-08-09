<!DOCTYPE HTML>
<html>
<head>
	<title>Admin - eCommerce Auction Webstore</title>
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style-admin.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>


<div class="row">

	<!-- Menu -->
	<div id="admin-sidebar-container">
		<ul class="menu">
			<li class=""><a href="#" class=""><span class="fa fa-dashboard"></span> Home</a></li>
			<li class="active has-children">
				<a href="#" class=""><span class="fa fa-shopping-cart"></span> Products</a>
				<ul class="menu sub-menu">
					<li><a href="#">Add Product</a></li>
					<li><a href="#">Products list</a></li>
					<li><a href="#">Categories</a></li>
				</ul>
			</li>
			<li class="has-children"><a href="#" class=""><span class="fa fa-legal"></span> Auction</a></li>
			<li class="has-children"><a href="#" class=""><span class="fa fa-pencil"></span> Blog</a></li>
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

</body>
</html>