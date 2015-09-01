@extends('layouts.default')

@section('title', 'About')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s12" id="about">
			<h4>Beta Testing</h4>
			<p>MaePaySoh (“Let’s Vote!”) API is not ready yet due on data availibility of candidates and parties. We still working with <a href="http://uecmyanmar.org" target="_blank">Union Election Commission (UEC) of Myanmar</a> to get the official data ready. So if you wanna try with our API you can test our API through beta program by register using link below.</p>
 
			<p>By registering through our beta program, you agree to try and test our API. You understand that data on our API is not official data for the Myanmar election 2015. If you find any problem, issue, or any suggestion on our API you can reach us through our <a href="https://www.facebook.com/MaePaySoh" target="_blank">Facebook page</a> or <a href="https://github.com/MyanmarAPI">Github account</a>.</p>
 			<p class="center">
 				<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('auth/register') }}?betauser=true">
					<i class="material-icons left">create</i>Register Beta Developer
				</a>
			</p>		

		</div>
	</div>
@endsection