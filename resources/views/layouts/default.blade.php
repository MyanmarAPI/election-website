<!DOCTYPE html>
<html>
<head>
	<title>2015 Myanmar Election API - @yield('title')</title>

	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>

	<div class="navbar-fixed">
		<nav class="cyan">
			<div class="nav-wrapper app-container">
				<div class="col s12">
					<a href="#" class="brand-logo">Logo</a>

					<a href="#" data-activates="nav-mobile" class="button-collapse">
						<i class="mdi-navigation-menu"></i>
					</a>

					<ul class="right hide-on-med-and-down">
						<li><a href="#">Home</a></li>
						<li><a href="#">Application</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>

					<ul id="nav-mobile" class="side-nav">
						<li class="nav-logo">
							<a href="#" >Logo</a>
						</li>
						<li><a href="#">Home</a></li>
						<li><a href="#">Application</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div> <!-- end of div.nav-wrapper -->
		</nav>
	</div> <!-- end of div.navbar-fixed -->

	<div class="hero center grey lighten-2">
		<div class="app-container white-text">
			<h2>2015 Myanmar Election API</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<a class="waves-effect waves-light btn-large cyan">
				<i class="mdi-navigation-check left"></i>Register
			</a>
		</div>
	</div> <!-- end of div.hero -->

	<div id="content">
		<div class="row app-container mg-top">
			<div class="col s6" id="develop-card">
				<div class="card">
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
				<div class="card">
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
	</div> <!-- end of div#content -->


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

</body>
</html>