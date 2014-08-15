@extends('admin/master')

@section('content')
	<h3>Products list</h3>

	<table id="products_list">
		<tr>
			<th class="image">Image</th>
			<th class="name">Name</th>
			<th class="excerpt">Description</th>
			<th class="type">Type</th>
			<th class="price">Price</th>
			<th class="sale_price">Sale Price</th>
			<th class="opening_bid">Opening Bid</th>
			<th class="updated_at">Updated At</th>
			<th class="edit">Edit</th>
		</tr>
		@foreach($products as $product)
			<tr id="product-{{ $product -> id }}">
				<td class="image">
				</td>
				<td class="name">
					{{ $product -> name }}
				</td>
				<td class="excerpt">
					{{ $product -> excerpt }}
				</td>
				<td class="type">
					{{ $product -> type }}
				</td>
				<td class="price">
					{{ $product -> price }} {{ $currency }}
				</td>
				<td class="sale_price">
					{{ $product -> sale_price }} {{ $currency }}
				</td>
				<td class="opening_bid">
					{{ $product -> opening_bid }} {{ $currency }}
				</td>
				<td class="updated_at">
					{{ $product -> updated_at }}
				</td>
				<td class="edit">
					<a href="product/{{ $product -> id }}">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop