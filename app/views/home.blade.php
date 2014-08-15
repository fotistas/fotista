@extends('master')

@section('content')
	<!-- Slider -->
	<div class="container">
		<div class="flexslider" id="top-slider">
			<ul class="slides">
				<li>
					<img src="images/slider/nixon-watch-advertising.jpg" />
				</li>
				<li>
					<img src="images/slider/Panerai-Watch_Advertising_Wallpaper_1024x768.jpg" />
				</li>
				<li>
					<img src="images/slider/watch-advertising.jpg" />
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery('#top-slider').flexslider({
				controlNav: false,
				slideshowSpeed: 6000,
			});
		</script>
	</div>

	<!-- Store -->
	<div class="container">

		<div class="section">
			<div class="row">
				<div class="section-title float_left">Featured Products</div>
				<div class="view-all float_right">
					<a href="{{ URL::to('store') }}">
						<span class="fa fa-eye"></span>
						View all
					</a>
				</div>
			</div>

			<div class="product-list grid">

				@foreach( $featured_products as $product )
				  @if ( $product -> sale_price > 0 )
					<div class="product sale col-1-4">
				  @else
					<div class="product col-1-4">
				  @endif
						<a href="{{ URL::to( 'store/product/' . $product -> id ) }}">
							<div class="thumbnail transition">
								<div class="img-wrap">
									<img src="{{ $product -> thumbnail }}" />
								</div>
								<div class="price">
									@if ( $product -> sale_price > 0 )
										<del>
											<span class="amount">{{ $product -> price }}</span> {{ $currency }}
										</del>
										<ins>
											<span class="amount">{{ $product -> sale_price }}</span> {{ $currency }}
										</ins>
									@else
										<ins>
											<span class="amount">{{ $product -> price }}</span> {{ $currency }}
										</ins>
									@endif
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

		</div> <!-- section -->


		<div class="section">
			<div class="row">
				<div class="section-title float_left">New Products</div>
				<div class="view-all float_right">
					<a href="{{ URL::to('store') }}">
						<span class="fa fa-eye"></span>
						View all
					</a>
				</div>
			</div>

			<div class="product-list grid">

				@foreach( $new_products as $product )
				  @if ( $product -> sale_price > 0 )
					<div class="product sale col-1-4">
				  @else
					<div class="product col-1-4">
				  @endif
						<a href="{{ URL::to( 'store/product/' . $product -> id ) }}">
							<div class="thumbnail transition">
								<div class="img-wrap">
									<img src="{{ $product -> thumbnail }}" />
								</div>
								<div class="price">
									@if ( $product -> sale_price > 0 )
										<del>
											<span class="amount">{{ $product -> price }}</span> {{ $currency }}
										</del>
										<ins>
											<span class="amount">{{ $product -> sale_price }}</span> {{ $currency }}
										</ins>
									@else
										<ins>
											<span class="amount">{{ $product -> price }}</span> {{ $currency }}
										</ins>
									@endif
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

		</div> <!-- /section -->

	</div> <!-- /container -->
@stop