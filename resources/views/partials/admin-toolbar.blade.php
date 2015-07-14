<div id="toolbar" class="toolbar-container grey darken-3">
	<div class="row app-container" >
		<div class="col s12 m9 l8">
			<a class="waves-effect waves-light btn-flat white-text" href="{{ url('applications') }}">
				<i class="material-icons left">apps</i>Applications
			</a>
			<a class="waves-effect waves-light btn-flat white-text" href="{{ url('users') }}">
				<i class="material-icons left">people</i>Register Users
			</a>
			<a class="waves-effect waves-light btn-flat white-text" href="{{ url('members') }}">
				<i class="material-icons left">supervisor_account</i>Admin Members
			</a>
		</div>
		@if(isset($routeName) && isset($placeHolder))
		<div class="col s12 m3 l4">
			{!! Form::open([
				'route' => $routeName, 
				'autocomplete' => 'false',
				'method' => 'GET'
			]) !!}
			<input name="s" type="search" placeholder="{{ $placeHolder }}" class="white-text">
			{!! Form::close() !!}
		</div>
		@endif
	</div> <!-- end of div.app-container -->

</div> <!-- end of div#toolbar -->