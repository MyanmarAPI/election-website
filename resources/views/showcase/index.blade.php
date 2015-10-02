@extends('layouts.default')

@section('title', 'Showcase')

@section('content')
	
	<div class="row app-container mg-top">

		<h4>MaePaySoh Apps Showcase</h4>

		@if ($apps->isEmpty())
		<div class="col s12" id="showcase">
			<p>Applications will be coming soon...</p>
		</div>
		@endif

		@foreach($apps as $app)
		<div class="col s12 m4 l3">
			<div class="card">
				<div class="card-image">
					<img src="{{ $app->icon }}">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">
						{{ $app->name }}<i class="material-icons right">more_vert</i>
					</span>
					<p>{{ app_type($app->type) }}</p>
				</div>
				<div class="card-action">
					<a href="{{ route('showcase.show', $app->slug) }}">
						Detail
					</a>
				</div>
			</div>
		</div> <!-- end of card -->
		@endforeach
	</div>
@endsection