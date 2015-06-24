@extends('layouts.default')

@section('title', 'Home')

@section('hero')
	<div class="hero center white">
		<div class="app-container">
			<h2>2015 Myanmar Election API</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			@if (Auth::guest())
			<a class="waves-effect waves-light btn-large cyan" href="{{ url('auth/register') }}">
				<i class="material-icons left">create</i>Create Your Account
			</a>
			@else
			<a class="waves-effect waves-light btn-large cyan" href="{{ url('dashboard') }}">
				<i class="material-icons left">dashboard</i>My Dashboard
			</a>
			@endif
		</div>
	</div> <!-- end of div.hero -->
@endsection

@section('content')
    <div class="row app-container mg-top">
		<div class="col s6" id="develop-card">
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

		<div class="col s6" id="contribute-card">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
          			<span class="card-title grey-text text-darken-2">Contribute</span>
					<p>If you want to develop an app using the API, 
					you need to register for your developer account.</p>
					<p>See detail guide for registration at documentation link.</p>
        		</div>
        		<div class="card-action">
          			<a href="#" class="cyan-text text-darken-2">How to Register</a>
        		</div>
      		</div> <!-- end of div.card -->
		</div> <!-- end of div#contribute-card -->

		<!-- <div class="col s4">
			<h3>API Lists</h3>
		</div> -->
	</div>
@endsection