@extends('admin/master')

@section('content')
	
	<div class="row">	

		{{ Form::model($auction, array('url' => 'admin/auction/' . $auction -> id, 'method' => $method, 'id' => 'auction-form')) }}

		<h3>{{ $subtitle }}</h3>

		<div class="col-1-2" id="auctions-sorting">

			<div class="row section">

				<div class="col-1-2">
					<h3>Products available for auction</h3>
					<ul id="available-products" class="sortable auction connectedLists">
						@foreach( $available_list as $product )
							<li id="product-{{ $product -> id }}">
								<div class="thumbnail">
									<img src="{{ $product -> thumbnail }}" />
								</div>
								{{ $product -> name }}
							</li>
						@endforeach
					</ul>

				</div> <!-- /col-1-2 -->

				<div class="col-1-2">
					<h3>Auction list</h3>
					<ul id="auctions-list" class="sortable auction connectedLists">
						@foreach( $products_in_auction as $product )
							<li id="product-{{ $product -> id }}">
								<div class="thumbnail">
									<img src="{{ $product -> thumbnail }}" />
								</div>
								{{ $product -> name }}
							</li>
						@endforeach
					</ul>

					{{ Form::input('hidden', 'products', null, array('name' => 'products', 'id' => 'products') ) }}

				</div> <!-- /col-1-2 -->

			</div> <!-- /section -->

		</div> <!-- /auctions-sorting -->

		<div class="col-1-2">

			<div class="row form">
				<div class="row">
					{{ Form::label('name', 'Auction name') }}
					<span class="input-wrap input-text-wrap">
						{{ Form::text('name', null, array('name' => 'name', 'placeholder' => 'Auction name') ) }}
					</span>
				</div>

				<div class="row">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description', null, array('name' => 'description') ) }}
				</div>
			</div> <!-- /section -->

			<div class="row form">
				<div class="col-1-2">

					<div class="row">
						{{ Form::label('enter_prod_time', 'Product enter auction with this time for bidding:') }}
						<span class="input-wrap input-text-wrap">
							{{ Form::text('enter_prod_time', null, array('name' => 'enter_prod_time') ) }}
						</span>
					</div>

					<div class="row">
						{{ Form::label('after_bid_time', 'After bidding timer will increase by this amount:') }}
						<span class="input-wrap input-text-wrap">
							{{ Form::text('after_bid_time', null, array('name' => 'after_bid_time') ) }}
						</span>
					</div>

				</div>
				<div class="col-1-2">

					<div class="row">
						{{ Form::label('start', 'Auction start date and time:') }}
						{{ Form::text('start', null, array('name' => 'start') ) }}
					</div>
					<div class="row">
						<div class="float_left">
							<button id="save_auction">
								Save
							</button>
						</div>
						<div class="float_right">
							<a href="#" id="delete_auction" class="danger">
								Delete
							</a>
						</div>
					</div>
					<div class="row">
						<div id="error-message">
						</div>
						<div id="success-message">
						</div>
					</div>

				</div>
				
			</div> <!-- /section -->

		</div> <!-- /col-1-2 -->

		{{ Form::close() }}

	</div>

@stop