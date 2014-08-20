@extends('master')

@section('content')

	<div class="container">

		@if ( $product -> type == 'auction' )
		  <div class="single-product auction row">
		@else
		  <div class="single-product row">
		@endif

			<div class="col-1-2">
				<div class="thumbnail">
					@if ( $product -> type == 'auction' )
						<div class="auction">Auction</div>
					@endif
					<img src="{{ $product -> large }}" />
				</div>
			</div>

			<div class="col-1-2">
				<h1>{{ $product -> name }}</h1>
				<div class="description">
					{{ $product -> description }}
				</div>
				<div class="price">
					@if ( $product -> type != 'auction' )
						Price:
						@if ( $product -> sale_price > 0 )
							<del>{{ $product -> price }} {{ $currency }}</del>
							<ins>{{ $product -> sale_price }} {{ $currency }}</ins>
						@else
							<ins>{{ $product -> price }} {{ $currency }}</ins>
						@endif
					@else
						Opening bid:
						<ins>{{ $product -> opening_bid }} {{ $currency }}</ins>
					@endif
				</div>

				@if ( $product -> type != 'auction' )
					<form id="add-to-cart">
						<input type="hidden" id="product-id" name="product-id" value="" />
						<button>Add to cart</button>
					</form>
				@endif

			</div>

		</div> <!-- /row -->

	</div> <!-- /container -->

@stop