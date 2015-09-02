@extends('layouts.default')

@section('title', 'Showcase')


@section('content')
	
	<div class="row app-container mg-top">
		@if ($apps->isEmpty())
		<div class="col s12" id="showcase">
			<h4>MaePaySoh Apps Showcase</h4>
			<p>
				Applications powered by the MaePaySoh (“Let’s Vote”) API will be showcased here!
			</p>
			<p>Join the MaePaySoh Hack Challenge to build apps for voters powered by the MaePaySoh API!</p>
			<p>
			<a class="waves-effect waves-light btn-large indigo darken-2" target="_blank" href="https://docs.google.com/forms/d/1-ib5lVUq-SiAn_9AlXeC76LPv-2TtPwk6K6l12UNfjk/viewform">
					<i class="material-icons left">create</i>Join
				</a>
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