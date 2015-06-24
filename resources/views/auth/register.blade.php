@extends('layouts.default')

@section('title', 'Register')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s6 offset-s3">

			<div class="z-depth-1 box" id="register">
				<h4 class="box-header cyan-text text-darken-3">Create new account</h4>

				{!! Form::open(['url' => 'auth/register', 'autocomplete' => 'false', 'class' => 'form']) !!}
				
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="name" value="{{ old('name') }}" autocomplete="off"
						class="validate {{ $errors->has('name') ? 'invalid' : '' }}" >
						<label for="name">Name</label>
						<p class="form-error">{{ $errors->first('name') }}</p>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="email" name="email" value="{{ old('email') }}" autocomplete="off"
						class="validate {{ $errors->has('email') ? 'invalid' : '' }}" >
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
						<button class="btn waves-effect waves-light" type="submit" name="action">Register
	    					<i class="mdi-content-send right"></i>
	  					</button>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->

		</div> 
	</div>
@endsection