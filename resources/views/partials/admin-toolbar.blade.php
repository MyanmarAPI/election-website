<div id="toolbar" class="toolbar-container grey darken-3">
	<div class="row app-container" >
		<div class="col s12">
			<a class="waves-effect waves-teal btn-flat white-text" href="{{ url('applications') }}">
				<i class="material-icons left">apps</i>Applications
			</a>
			<a class="waves-effect waves-teal btn-flat white-text" href="{{ url('users') }}">
				<i class="material-icons left">people</i>Register Users
			</a>
			<a class="waves-effect waves-teal btn-flat white-text" href="{{ url('members') }}">
				<i class="material-icons left">supervisor_account</i>Admin Members
			</a>
			<a class="waves-effect waves-teal btn-flat white-text" href="{{ route('profile') }}">
				<i class="material-icons left">settings</i>Edit Profile
			</a>
			<a class="waves-effect waves-teal btn-flat white-text" href="{{ route('profile.password') }}">
				<i class="material-icons left">lock</i>Edit Password
			</a>
		</div>
	</div> <!-- end of div.app-container -->
</div> <!-- end of div#toolbar -->