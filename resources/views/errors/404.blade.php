@extends('layouts.default')

@section('title', '404 Not Found')

@section('content')
	<div class="row app-container center">
		<div class="not-found-container" style="margin-top:200px;">
			<h2>Oops .... Page Not Found.</h2>
			<a class="waves-effect waves-light btn-large grey darken-2" href="{{ url() }}">Go Back to Home Page</a>
		</div>
	</div>
@endsection