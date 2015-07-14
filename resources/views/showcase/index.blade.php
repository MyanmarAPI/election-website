@extends('layouts.default')

@section('title', 'Showcase')

@section('hero')
	<div class="hero center white">
		<div class="app-container">
			<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('/contact#submit-your-app') }}">
				How to Submit Your Application
			</a>
		</div>
        <div class="clearfix"></div>
	</div> <!-- end of div.hero -->
@endsection

@section('content')
	
	<div class="row app-container mg-top">
		@if ($apps->isEmpty())
		<div class="empty">
			<p class="center-align">
				Showcase is empty now. Submit your application for first showcase of Myanmar API.
			</p>
		</div>
		@endif

		@foreach($apps as $app)
		<div class="col s12 m4">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img src="{{ $app->icon }}">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">
						{{ $app->name }}<i class="material-icons right">more_vert</i>
					</span>
					<p>{{ app_type($app->type) }}</p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">
						{{ $app->name }}<i class="material-icons right">close</i>
					</span>
					<p>{{ $app->description }}</p>
					<a href="#">Detail</a>
				</div>
			</div>
		</div> <!-- end of card -->
		@endforeach
	</div>
@endsection