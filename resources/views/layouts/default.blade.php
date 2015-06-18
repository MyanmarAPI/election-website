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
						<li><a href="/">Home</a></li>
						<li><a href="3">Application</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
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

	@yield('hero')

	<div id="content">
		@yield('content')
	</div> <!-- end of div#content -->


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

</body>
</html>