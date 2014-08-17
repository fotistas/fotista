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

			<div class="row section">
				<div class="row">
					{{ Form::label('start', 'Auction start date and time:') }}
					{{ Form::text('start', null, array('name' => 'start') ) }}
				</div>
				<div class="row">
					<button id="save_auction">Save</button>
				</div>
				<div class="row">
					<div id="error-message">
					</div>
					<div id="success-message">
					</div>
				</div>
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

		</div> <!-- /col-1-2 -->

		{{ Form::close() }}

	</div>

@stop