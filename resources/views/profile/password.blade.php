@extends('layouts.default')

@section('title', 'Change Password')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s6 offset-s3">

			<div id="profile" class="box">

				<h4 class="box-header cyan-text text-darken-3">Change Password</h4>

				{!! Form::model($user, [
						'route' => 'profile.password.update', 
						'autocomplete' => 'false', 
						'class' => 'form'
					]) !!}

				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="old_password">
						<label for="old_password">Current Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="password_confirmation">
						<label for="password_confirmation">Confirm Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="action">
							Update Password
	  					</button>

	  					<a class="waves-effect waves-teal btn-flat blue-text text-darken-2" 
	  					href="{{ route('dashboard') }}">Cancel</a>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->

		</div> 
	</div>

@endsection
