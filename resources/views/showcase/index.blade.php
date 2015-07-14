@extends('layouts.default')

@section('title', 'Showcase')

@section('hero')
	<div class="hero center white">
		<div class="app-container">
			
			
			<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('contact#submit-your-app') }}">
				<i class="material-icons left">create</i>Submit Your Application
			</a>
		</div>
                <div class="clearfix"></div>
	</div> <!-- end of div.hero -->
@endsection

@section('content')
	
	<div class="row app-container mg-top">
		@foreach($apps as $app)
		<div class="col s12 m7">
			<div class="card">
				<div class="card-image">
					<img src="/img/mps-logo.png">
					<span class="card-title">{{ $app->title }}</span>
				</div>
				<div class="card-content">
					<p>{{ $app->description }}</p>
				</div>
			</div>
		</div> <!-- end of card -->
		@endforeach
	</div>
@endsection