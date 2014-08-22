@extends('master')

@section('content')

<div class="container">

	<h1>Hello, {{ $user -> first_name }}!</h1>

	<p>Username: {{ $user -> username }}</p>

	<p>Your email: {{ $user -> email }}</p>

	<p>Full name: {{ $user -> first_name }} {{ $user -> last_name }}</p>


</div> <!-- /container -->

@stop