@extends('master')

@section('content')

<div class="container">

	{{ Form::open(array('id' => 'signin-form')) }}
		<h2>
			Sign In
		</h2>
		<div class="row">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username') }}
		</div>
		<div class="row">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</div>
		{{ Form::submit('Sign In') }}
	{{ Form::close() }}

</div> <!-- /container -->

@stop