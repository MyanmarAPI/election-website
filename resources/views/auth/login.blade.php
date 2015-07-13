@extends('layouts.default')

@section('title', 'Login')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s6 offset-s3">

			<div class="z-depth-1 box" id="login">
				<h4 class="box-header mps-blue mps-yellow-text">Welcome Back</h4>

				{!! Form::open(['url' => 'auth/login', 'autocomplete' => 'false', 'class' => 'form']) !!}

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
						<input type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light indigo darken-2" type="submit" name="action">
							Login
	    					<i class="mdi-content-send right"></i>
	  					</button>

	  					<a class="waves-effect waves-indigo btn-flat blue-text text-darken-2" href="{{ url('/password/email') }}">Forgot Your Password?</a>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->
				
			<p class="center-align">Don't have an account? Sign Up for <a href="{{ url('auth/register') }}">New Account</a></p>

		</div> 
	</div>
@endsection