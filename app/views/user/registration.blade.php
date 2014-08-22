@extends('master')

@section('content')

<div class="container">

	{{ Form::open(array('id' => 'registration-form')) }}
		<h2>
			Registration
		</h2>

		@if ( is_array( $errors->all() ) && count( $errors->all() ) > 0 )
			<ul class="form-errors-list">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		<div class="row">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username') }}
		</div>
		<div class="row">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</div>
		<div class="row">
			{{ Form::label('password_confirmation', 'Password Confirmation') }}
			{{ Form::password('password_confirmation') }}
		</div>
		<div class="row">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email') }}
		</div>
		<div class="row">
			{{ Form::label('first_name', 'First name') }}
			{{ Form::text('first_name') }}
		</div>
		<div class="row">
			{{ Form::label('last_name', 'Last name') }}
			{{ Form::text('last_name') }}
		</div>
		{{ Form::submit('Register') }}
	{{ Form::close() }}

</div> <!-- /container -->

@stop