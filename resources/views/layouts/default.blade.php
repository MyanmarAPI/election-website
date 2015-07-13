<!DOCTYPE html>
<html>
<head>
	<title>2015 Myanmar Election API - @yield('title')</title>

	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link href="{{ ('img/favicon.png') }}" rel="icon" type="image/png">

	<!--Import materialize.css-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.css">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

</head>
<body>

	<div class="navbar-fixed">
		<nav class="grey lighten-4">
			<div class="nav-wrapper app-container">
				<div class="col s12">
					<a href="{{ url('/') }}" class="brand-logo">
						<img src="{{ asset('img/mps-logo.png') }}" alt="MaePaySoh Logo" height="60px">
						{{-- Myanmar Election API --}}
					</a>

					<a href="#" data-activates="nav-mobile" class="button-collapse">
						<i class="mdi-navigation-menu cyan-text"></i>
					</a>

					<ul class="right hide-on-med-and-down">
						@include('partials.nav')
					</ul>

					<ul id="nav-mobile" class="side-nav">
						<li class="nav-logo">
							<a href="{{ url('/') }}">
								<img src="{{ asset('img/mps-logo.png') }}" alt="MaePaySoh Logo" height="60px">
							</a>
						</li>
						@include('partials.nav')
					</ul>
				</div>
			</div> <!-- end of div.nav-wrapper -->
		</nav>
	</div> <!-- end of div.navbar-fixed -->
	
	<main>
		@yield('hero')

		<div id="content">
			@yield('content')
		</div> <!-- end of div#content -->
	</main>

	<footer class="indigo darken-2 white-text">
		<div class="app-container">
			<div class="row no-margin">
				<div class="col l12 s12">
					<p class="center-align">&copy; {{ date('Y') }} Myanmar Election API, All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ url('js/app.js') }}"></script>

    <script>
    	$(document).ready(function() {
    		@if (Session::get('success'))
    		// Show toast for session flash success message
    		Materialize.toast('{{ Session::get('success') }}', 4000, 'success');
    		@endif

    		@if (Session::get('error'))
    		// Show toast for session flash error message
    		Materialize.toast('{{ Session::get('error') }}', 4000, 'error');
    		@endif

		    @yield('scripts')
		});
    </script>

</body>
</html>