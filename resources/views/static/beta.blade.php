@extends('layouts.default')

@section('title', 'About')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s12 box-content white" id="beta">
			<h4>Beta Developer</h4>
			<p>MaePaySoh (“Let’s Vote!”) API will be published by September 12, 2015! We are still working with <a href="http://uecmyanmar.org" target="_blank">Union Election Commission (UEC) of Myanmar</a>  to ensure the official data is ready for use. </p>
			<p>Until then, you are welcome to test our API through a beta program! Register using the link below.</p>
			<p>By registering for our beta program, you agree to try and test our API. You also understand that data available through our beta program is NOT official data for the Myanmar election 2015. If you find any problem or issue, or have any suggestions on our API you can reach us through our <a href="https://www.facebook.com/MaePaySoh" target="_blank">Facebook page</a> or <a href="https://github.com/MyanmarAPI">Github account</a>.</p>

 			<p class="center">
 				<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('auth/register') }}?betauser=true">
					<i class="material-icons left">create</i>Register Beta Developer
				</a>
			</p>		

		</div>
	</div>
@endsection