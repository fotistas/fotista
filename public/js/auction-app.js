var auction = angular.module('auction', [], function($interpolateProvider) {
		// changing angular print tags so it will work nicely with blade
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	})
	.constant("getAuctionUrl", "../api/auction")
	.constant("getLiveauctionUrl", "../api/liveauction")
	.controller('auctionCtrl', ['$scope', '$http', '$interval', 'getAuctionUrl', 'getLiveauctionUrl', function($scope, $http, $interval, getAuctionUrl, getLiveauctionUrl){

		$scope.data = {};

		// Get init data about auction and products
		$http.get(getAuctionUrl)
			.success(function (data) {
				$scope.data.auction = data.auction;
				$scope.data.products = data.products;
				$scope.data.currency = data.currency;
				$scope.data.logged_in = data.logged_in;

				var images = JSON.parse( data.products[0].images );
				$scope.data.current_product = {
					name: data.products[0].name,
					thumbnail: data.products[0].thumbnail,
					excerpt: data.products[0].excerpt,
					image: images.full,
					bid: data.products[0].opening_bid
				}

				$interval( updateAuction, 1000 )

				function updateAuction() {
					$http.get( getLiveauctionUrl )
						.success(function (data) {
							console.log( data );
						})
				}

			})
			.error(function (data) {
				$scope.data.error = data;
			});
	}]);