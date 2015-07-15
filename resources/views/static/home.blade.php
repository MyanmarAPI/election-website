@extends('layouts.default')

@section('title', 'Home')

@section('hero')
	<div class="hero center white">
		<div class="app-container">
			<img src="{{ asset('img/mps-logo.png') }}" alt="MaePaySoh Logo" height="200px">
			<h2>2015 Myanmar Election API</h2>
			<p>Welcome to MyanmarAPI, a civic information API for the 2015 elections and beyond!</p>
			<p>Developers are using MyanmarAPI to build mobile and web applications.</p>

			@if (Auth::guest())

				@if (env('REGISTRATION_ENABLE'))
					<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('auth/register') }}">
						<i class="material-icons left">create</i>Create Your Account
					</a>
				@else
					<button class="waves-effect waves-light btn-large indigo darken-2">
						Coming Soon...
					</button>
				@endif
			@else
			<a class="waves-effect waves-light btn-large indigo" href="{{ url('dashboard') }}">
				<i class="material-icons left">dashboard</i>My Dashboard
			</a>
			@endif
		</div>
                <div class="clearfix"></div>
	</div> <!-- end of div.hero -->
@endsection

@section('content')
    <div class="row app-container mg-top">
		<div class="col m6 s12" id="develop-card">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
          			<span class="card-title grey-text text-darken-2">Develop</span>
					<p>If you want to develop an app using the API, 
					you need to register for your developer account.</p>
					<p>See detail guide for registration at documentation link.</p>
        		</div>
        		<div class="card-action">
          			<a href="#" class="cyan-text text-darken-2">How to Register</a>
        		</div>
      		</div> <!-- end of div.card -->
		</div> <!-- end of div#develop-card -->

		<div class="col m6 s12" id="contribute-card">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
          			<span class="card-title grey-text text-darken-2">Contribute</span>
					<p>MyanmarAPI is a completely open-source project. 
					You can find all the code for the API at our <a href="https://github.com/MyanmarAPI" target="_blank">GitHub organization page</a>.</p>
					<p>See detail guide for contributing at documentation link.</p>
        		</div>
        		<div class="card-action">
          			<a href="#" class="cyan-text text-darken-2">How to Contribute</a>
        		</div>
      		</div> <!-- end of div.card -->
		</div> <!-- end of div#contribute-card -->

		<!-- <div class="col s4">
			<h3>API Lists</h3>
		</div> -->
	</div>
@endsection