@extends('admin/master')

@section('content')
	<h3>Products list</h3>

	<table id="products_list">
		<tr>
			<th class="name">Name</th>
			<th class="description">Description</th>
			<th class="type">Type</th>
			<th class="price">Price</th>
			<th class="sale_price">Sale Price</th>
			<th class="opening_bid">Opening Price</th>
			<th class="edit">Edit</th>
		</tr>
		@foreach($products as $product)
			<tr>
				<td class="name">
					{{ $product -> name }}
				</td>
				<td class="description">
					{{ $product -> description }}
				</td>
				<td class="type">
					{{ $product -> type }}
				</td>
				<td class="price">
					{{ $product -> price }} $
				</td>
				<td class="sale_price">
					{{ $product -> sale_price }} $
				</td>
				<td class="opening_bid">
					{{ $product -> opening_bid }} $
				</td>
				<td class="edit">
					<a href="#">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop