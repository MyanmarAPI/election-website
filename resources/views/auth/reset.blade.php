@extends('layouts.default')

@section('title', 'Reset Password')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s6 offset-s3">

			<div class="z-depth-1 box" id="login">
				<h4 class="box-header cyan-text text-darken-3">Reset Password</h4>

				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

				{!! Form::open(['url' => '/password/reset', 'autocomplete' => 'false', 'class' => 'form']) !!}

				<input type="hidden" name="token" value="{{ $token }}">

				<div class="row">
					<div class="input-field col s12">
						<input type="email" name="email" value="{{ old('email') }}" autocomplete="off"
						class="validate {{ $errors->has('email') ? 'invalid' : '' }}">
						<label for="email">Email</label>
						<p class="form-error">{{ $errors->first('email') }}</p>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="password_confirmation">
						<label for="password_confirmation">Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="password">
						<label for="password">Confirm Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="action">
							Reset Password
	  					</button>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->
				
			<p class="center-align">Don't have an account? Sign Up for <a href="{{ url('auth/register') }}">New Account</a></p>

		</div> 
	</div>
@endsection