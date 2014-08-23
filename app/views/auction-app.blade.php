<!DOCTYPE HTML>
<html>
<head>
	<title>eCommerce Auction Webstore</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/grid.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}">

</head>
<body id="auction-started" ng-app="auction">

<!-- Auction Started -->
<div ng-controller="auctionCtrl">

	<div class="row">

		<div class="col-1-5">
			<h2>Next products</h2>

			<div class="auction-list">

				<div class="product" ng-repeat="product in data.products">
					<div class="thumbnail">
						<img ng-src="<% product.thumbnail %>" />
					</div>
					<div class="title"><% product.name %></div>
				</div>

			</div> <!-- /auction-list -->
		</div>

		<div class="auction-main col-3-5">

			<div class="thumbnail">
				<img ng-src="<% data.current_product.image %>" />
			</div>
			<div class="title"> <% data.current_product.name %> </div>
			<div class="current-bid">
				<% data.currency %> <span class="amount"> <% data.current_product.bid %> </span>
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

		</div> <!-- /auction-messages -->

	</div>

</div> <!-- /container -->


<script src="{{ URL::to('js/angular/angular.min.js') }}"></script>
<script src="{{ URL::to('js/auction-app.js') }}"></script>

</body>
</html>