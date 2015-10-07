@extends('layouts.default')

@section('title', 'Showcase')

@section('content')
	
	<div class="row app-container mg-top" id="showcase-lists">

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
					<div class="showcase-app-title">
						<a href="{{ route('showcase.show', $app->slug) }}"
							title="{{ $app->name }}">
							<span class="card-title activator grey-text text-darken-4">
								{{ $app->name }}
							</span>
						</a>
					</div>
					<p>{{ $app->getTypeString() }}</p>
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

@section('scripts')
var ciw = $('.card-image').width();
$('.card-image').css({'height':ciw+'px'});
@endsection