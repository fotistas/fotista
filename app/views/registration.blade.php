@extends('master')

@section('content')

<div class="container">

	{{ Form::open(array('id' => 'signin-form')) }}
		<h2>
			Registration
		</h2>
		<div class="row">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username') }}
		</div>
		<div class="row">
			{{ Form::label('password', 'Password') }}
			{{ Form::text('password') }}
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