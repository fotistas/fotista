@extends('master')

@section('content')

<div class="container">

	<div class="product-list grid">

		@foreach( $products as $product )
		  @if ( $product -> sale_price > 0 )
			<div class="product sale col-1-4">
		  @else
			<div class="product col-1-4">
		  @endif
				<a href="{{ URL::to( 'product/' . $product -> id ) }}">
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

</div> <!-- /container -->

@stop