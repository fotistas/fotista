<!DOCTYPE HTML>
<html>
<head>
	<title>eCommerce Auction Webstore</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/grid.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/flexslider.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::to('js/jquery.flexslider-min.js') }}"></script>
</head>
<body>
	<div id="languages-container">
		<ul class="languages menu">
			<li><a href="#">Eng</a></li>
			<li><a href="#">Rus</a></li>
			<li><a href="#">Heb</a></li>
		</ul>
	</div>

	<div class="container">
		<div class="row">

			<div class="float_left">
				<a href="{{ URL::to('') }}">
					<div id="top-logo">
						<span class="fa fa-leaf"></span>
					</div>
				</a>
			</div>

			<div class="float_right">
				<div id="account-menu-container">
					<ul class="menu grid">
						<li class="menu-item"><a href="#"><span>My Account</span></a></li>
						<li class="menu-item"><a href="#"><span>Sign Out</span></a></li>
						<li class="menu-item cart-icon"><a href="#"><span>Cart</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Menu -->
	<div class="container">
		<div id="main-menu-container" class="grid">
			<ul class="menu float_left">
				<li class="menu-item"><a class="transition" href="{{ URL::to('') }}"><span>Home</span></a></li>
				<li class="menu-item"><a class="transition" href="{{ URL::to('store') }}"><span>Store</span></a></li>
				<li class="menu-item"><a class="transition" href="{{ URL::to('auction') }}"><span>Auction</span></a></li>
				<li class="menu-item"><a class="transition" href="{{ URL::to('blog') }}"><span>Blog</span></a></li>
				<li class="menu-item"><a class="transition" href="{{ URL::to('contact-us') }}"><span>Contact Us</span></a></li>
			</ul>

			<div id="menu-search-container" class="float_right">
				<form>
					<span class="fa fa-search"></span>
					<span class="input-wrap input-text-wrap">
						<input type="text" name="search" class="transition" id="search" placeholder="Search" />
					</span>
				</form>
			</div>
		</div>
	</div>



	@yield('content')



	<!-- Footer -->
	<div id="footer">
		<div class="container">

			<div class="row">

				<div class="col-1-4">
					<div class="row title">
						<div class="float_left">
							Privacy
						</div>
						<div class="float_right">
							<span class="fa fa-eye-slash"></span>
						</div>
					</div>
					<div class="description">
						Your privacy is guarantied. We will never give, lease or sell your personal information.
					</div>
				</div>

				<div class="col-1-4">
					<div class="row title">
						<div class="float_left">
							Satisfaction
						</div>
						<div class="float_right">
							<span class="fa fa-heart"></span>
						</div>
					</div>
					<div class="description">
						Not 100% happy with your expoirience? We offer a no quibble replacement or full refund.
					</div>
				</div>

				<div class="col-1-4">
					<div class="row title">
						<div class="float_left">
							Secure
						</div>
						<div class="float_right">
							<span class="fa fa-lock"></span>
						</div>
					</div>
					<div class="description">
						This site is tested and certified daily to pass the FBI / SANS internet Security test.
					</div>
				</div>

				<div class="col-1-4">
					<div class="row title">
						<div class="float_left">
							Support
						</div>
						<div class="float_right">
							<span class="fa fa-support"></span>
						</div>
					</div>
					<div class="description">
						Talk with out representative for customer support and purchasing / return issues. We are Online!
					</div>
				</div>

			</div> <!-- /row -->

			<div class="row bottom">
				<div id="payment-options" class="float_left">
					We accept all types of credit cards.
				</div>
				<div id="copyright" class="float_right">
					&copy; 2014, All rights reserved
				</div>
			</div> <!-- /bottom -->

		</div> <!-- /container -->
	</div>

</body>
</html>