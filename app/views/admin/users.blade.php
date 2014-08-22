@extends('admin/master')

@section('content')
	<h3>Users list</h3>

	<table id="products_list">
		<tr>
			<th class="username">Username</th>
			<th class="email">Email</th>
			<th class="first_name">First Name</th>
			<th class="last_name">Last Name</th>
			<th class="edit">Edit</th>
		</tr>
		@foreach($users as $user)
			<tr id="user-{{ $user -> id }}">
				<td class="username">
					{{ $user -> username }}
				</td>
				<td class="email">
					{{ $user -> email }}
				</td>
				<td class="first_name">
					{{ $user -> first_name }}
				</td>
				<td class="last_name">
					{{ $user -> last_name }}
				</td>
				<td class="edit">
					<a href="user/{{ $user -> id }}">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop