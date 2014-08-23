var auction = angular.module('auction', [], function($interpolateProvider) {
		// changing angular print tags so it will work nicely with blade
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	})
	.constant("getAuctionUrl", "../api/auction")
	.controller('auctionCtrl', ['$scope', '$http', 'getAuctionUrl', function($scope, $http, getAuctionUrl){

		$scope.data = {};

		// Get init data about auction and products
		$http.get(getAuctionUrl)
			.success(function (data) {
				$scope.data.auction = data.auction;
				$scope.data.products = data.products;
				$scope.data.currency = data.currency;

				var images = JSON.parse( data.products[0].images );
				$scope.data.current_product = {
					name: data.products[0].name,
					thumbnail: data.products[0].thumbnail,
					image: images.full,
					bid: data.products[0].opening_bid
				}

				console.log( $scope.data );
			})
			.error(function (data) {
				$scope.data.error = data;
			});
	}]);