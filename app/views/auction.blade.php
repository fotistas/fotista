@extends('master')

@section('content')

<div class="container">

	<h1>Auction Products</h1>

	<div id="auction-message">
		<!-- Auction will start <span class="date">{{ $auction -> start }}</span> -->
		<div class="row">
			Auction started <a href="{{ URL::to('auction/started') }}" id="open-auction-started" class="btn">click here to open it</a>
		</div>
	</div>

	<!--
	<form id="auction-reminder">
		<label for="email">Remind me 30 min before auction starts:</label>
		<span class="input-wrap input-email-wrap">
			<input type="email" name="email" id="email" placeholder="Email">
		</span>
		<button class="transition">Remind me</button>
	</form>
	-->

	<div class="product-list auction grid">

		@foreach( $products_in_auction as $key => $product )
			<div class="product col-1-4">
				<div class="count">{{ $key + 1 }}</div>
				<a href="{{ URL::to( 'auction/product/' . $product -> id ) }}">
					<div class="thumbnail transition">
						<div class="img-wrap">
							<img src="{{ $product -> thumbnail }}" />
						</div>
						<div class="price">
							<ins>
								<span class="amount">{{ $product -> opening_bid }}</span> {{ $currency }}
							</ins>
						</div>
					</div>
				</a>
				<div class="title">{{ $product -> name }}</div>
				<div class="description">
					<div class="text">
						{{ $product -> excerpt }}
					</div>
				</div>
				<div class="more-details">
					<a href="#">
						<span class="fa fa-angle-right"></span>
						More Details
					</a>
				</div>
			</div> <!-- /product -->

		@endforeach

	</div> <!-- /product-list -->

</div> <!-- /container -->

@stop