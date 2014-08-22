<!DOCTYPE HTML>
<html>
<head>
	<title>eCommerce Auction Webstore</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/grid.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}">

</head>
<body>

<!-- Auction Started -->
<div class="container">

	<div class="row">

		<div class="auction-list col-1-5">

			<div class="title">Next products</div>

			<div class="product">
				<div class="thumbnail">
					<img src="images/product/1df5c213d7bb_300.jpg" />
				</div>
				<div class="title">Wind</div>
			</div>

			<div class="product">
				<div class="thumbnail">
					<img src="images/product/aqua_300.jpg" />
				</div>
				<div class="title">The Aquarium</div>
			</div>

			<div class="product">
				<div class="thumbnail">
					<img src="images/product/Harry-Winston-Opus-11_300.jpg" />
				</div>
				<div class="title">Opus Eleven</div>
			</div>

		</div> <!-- /auction-list -->

		<div class="auction-main col-3-5">

			<div class="thumbnail">
				<img src="images/product/Vantasy-Mens-Luxury-Gold-Plated-Stainless-Steel-Hand-Wind-Skeleton-Analog-Mechanical-Black-Leather-Wrist-Watch-3.jpg" />
			</div>
			<div class="title">Bossman Watch</div>
			<div class="current-bid">
				$ <span class="amount">700</span>
			</div>

			<form id="put-bid">
				<button id="next-bid-step-btn"><span class="fa fa-arrow-up"></span>Next bid step</button>
				<span class="input-wrap input-number-wrap"><input type="number" id="new-bid" name="new-bid" /></span>
				<button id="bid-btn">Bid</button>
			</form>

		</div> <!-- /auction-main -->

		<div class="auction-messages col-1-5">

			<div class="message new-product">
				New product for auction: <span class="name">Bossman Watch</span>
			</div>

			<div class="message new-bid">
				New bid <span class="amount">400</span> $
			</div>

			<div class="message new-bid">
				New bid <span class="amount">450</span> $
			</div>

			<div class="message new-bid">
				New bid <span class="amount">700</span> $
			</div>

			<div class="message new-product">
				New product for auction: <span class="name">Wind</span>
			</div>

			<div class="message new-bid">
				New bid <span class="amount">1200</span> $
			</div>

		</div> <!-- /auction-messages -->

	</div>

</div> <!-- /container -->


<script src="{{ URL::to('js/jquery.min.js') }}"></script>
<script src="{{ URL::to('js/auction-app.js') }}"></script>

</body>
</html>