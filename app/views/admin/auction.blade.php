@extends('admin/master')

@section('content')
	
	<div class="row">	

		<div class="col-1-2" id="auctions-sorting">

			<div class="row section">

				<div class="col-1-2">
					<h3>Free auction products</h3>
					<ul id="free-auctions" class="sortable auction connectedLists">
						@foreach( $auctions as $auction )
							<li id="auction-{{ $auction -> id }}">
								<div class="thumbnail">
									<img src="{{ $auction -> thumbnail }}" />
								</div>
								{{ $auction -> name }}
							</li>
						@endforeach
					</ul>

				</div> <!-- /col-1-2 -->

				<div class="col-1-2">
					<h3>Auction list</h3>
					<ul id="auctions-list" class="sortable auction connectedLists">
						@foreach( $auctions as $auction )
							<li id="auction-{{ $auction -> id }}">
								<div class="thumbnail">
									<img src="{{ $auction -> thumbnail }}" />
								</div>
								{{ $auction -> name }}
							</li>
						@endforeach
					</ul>
					<input type="hidden" id="auctions-list-input" value="" />

				</div> <!-- /col-1-2 -->

			</div> <!-- /section -->

			<div class="row section">
				<div class="row">
					Auction start date and time: <input id="auction-start-date" type="text" />
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
			&nbsp;
		</div> <!-- /col-1-2 -->

	</div>

@stop