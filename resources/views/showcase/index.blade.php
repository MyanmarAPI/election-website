@extends('layouts.default')

@section('title', 'Showcase')

@section('content')
	
	<div class="row app-container mg-top" id="showcase-lists">

		<h4>MaePaySoh Apps Showcase</h4>

		<div class="row">
			@if ( $hasPagination)
			<div class="col">
				<a class='waves-effect waves-light btn indigo darken-2' href='/showcase' >All</a>
				<a class='waves-effect waves-light btn indigo darken-2' href='/showcase?t=android'>Android</a>
				<a class='waves-effect waves-light btn indigo darken-2' href='/showcase?t=ios'>iOS</a>
				<a class='waves-effect waves-light btn indigo darken-2' href='/showcase?t=web' >Web</a>
			</div>
			@else
			<div class="col">
				<button class='waves-effect waves-light btn indigo darken-2 filter' data-filter=".all" >All</button>
				<button class='waves-effect waves-light btn indigo darken-2 filter' data-filter=".android">Android</button>
				<button class='waves-effect waves-light btn indigo darken-2 filter' data-filter=".ios">iOS</button>
				<button class='waves-effect waves-light btn indigo darken-2 filter' data-filter=".web">Web</button>
			</div>
			@endif
		</div>

		@if ($apps->isEmpty())
		<div class="col s12" id="showcase">
			<p>Applications will be coming soon...</p>
		</div>
		@endif
		
		<div id="showcase-container" class="row">
		@foreach($apps as $app)
		<div class="col s12 m4 l3 mix all {{ implode(' ', $app->type) }}">
			<div class="card">
				<div class="card-image">
					<img src="{{ url($app->icon) }}">
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

		{!! $apps->render() !!}

	</div>
@endsection

@if ( ! $hasPagination)
	<style>
		.mix {
			display: none;
		}
	</style>

	@section('script_files')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js"></script>
	@endsection

@endif


@section('scripts')

	function adjustImageHeight() {
		var ciw = $('.card-image').width();
		$('.card-image').css({'height':ciw+'px'});	
	}

	@if ( ! $hasPagination)
		$('#showcase-container').mixItUp({
			callbacks: {
				onMixLoad: function(state){
					adjustImageHeight();
				}
			}
		});
	@else
		adjustImageHeight();
	@endif

@endsection