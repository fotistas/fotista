@extends('admin/master')

@section('content')
	<h3>Auctions list</h3>

	<table id="products_list">
		<tr>
			<th class="name">Name</th>
			<th class="start">Start</th>
			<th class="products">Products</th>
			<th class="excerpt">Description</th>
			<th class="edit">Edit</th>
		</tr>
		@foreach($auctions as $auction)
			<tr id="auction-{{ $auction -> id }}">
				<td class="name">
					{{ $auction -> name }}
				</td>
				<td class="start">
					{{ $auction -> start }}
				</td>
				<td class="products">
					{{ $auction -> products }}
				</td>
				<td class="excerpt">
					{{ $auction -> excerpt }}
				</td>
				<td class="edit">
					<a href="auction/{{ $auction -> id }}">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop