@extends('layouts.default')

@section('title', 'Profile')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s6 offset-s3">

			<div id="profile" class="box">

				<h4 class="box-header mps-blue mps-yellow-text">Update Profile</h4>

				{!! Form::model($user, [
						'route' => 'profile.update', 
						'autocomplete' => 'false', 
						'class' => 'form'
					]) !!}

				<div class="row">
					<div class="input-field col s12">
						{!! Form::text('name', null, ['class' => $errors->has('name') ? 'validate invalid' : 'validate']) !!}
						<label for="name">Name</label>
						<p class="form-error">{{ $errors->first('name') }}</p>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						{!! Form::email('email', null, ['class' => $errors->has('email') ? 'validate invalid' : 'validate']) !!}
						<label for="email">Email</label>
						<p class="form-error">{{ $errors->first('email') }}</p>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="action">
							Update
	  					</button>

	  					<a class="waves-effect waves-indigo btn-flat blue-text text-darken-2" 
	  					href="{{ route('dashboard') }}">Cancel</a>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->

		</div> 
	</div>

@endsection
