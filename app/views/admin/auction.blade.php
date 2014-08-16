@extends('admin/master')

@section('content')
	
	<div class="row">	

		<div class="col-1-2" id="auctions-sorting">

			<div class="row">

				<div class="col-1-2">
					<h3>Free auction products</h3>
					<ul id="free-auctions" class="sortable auction connectedLists">
						@foreach( $auctions as $auction )
							<li>
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
							<li>
								<div class="thumbnail">
									<img src="{{ $auction -> thumbnail }}" />
								</div>
								{{ $auction -> name }}
							</li>
						@endforeach
					</ul>

				</div> <!-- /col-1-2 -->

			</div> <!-- /row -->

		</div> <!-- /auctions-sorting -->

		<div class="col-1-2">
			&nbsp;
		</div> <!-- /col-1-2 -->

	</div>

@stop