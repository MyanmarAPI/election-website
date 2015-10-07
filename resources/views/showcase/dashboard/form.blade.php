@extends('layouts.default')

@section('title', 'Showcase')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s12">

			<div id="app-create" class="box">

				@if ( isset($model))
					<h4 class="box-header cyan-text text-darken-3">Edit showcase</h4>

					{!! Form::model($model, [
							'route' => ['showcase.edit', $model->id], 
							'class' => 'form'
						]) !!}
				@else
					<h4 class="box-header cyan-text text-darken-3">Create new showcase</h4>

					{!! Form::open([
							'route' => 'showcase.create', 
							'class' => 'form'
						]) !!}
				@endif
				
				<div class="row">
					<div class="col s12 m6">
						<div class="row">
							<div class="input-field col s12">
								{!! Form::text('name', null, ['class' => $errors->has('name') ? 'validate invalid' : 'validate']) !!}
								<label for="name">Application Name</label>
								<p class="form-error">{{ $errors->first('name') }}</p>
							</div>
						</div>
						
						@if (isset($model))
						<div class="row">
							<div class="input-field col s12">
								{!! Form::text('slug', $model->slug) !!}
								<label for="slug">Slug</label>
								<p class="form-error">{{ $errors->first('slug') }}</p>
							</div>
						</div>
						@endif

						<div class="row">
							<div class="input-field col s12">
								{!! Form::url('store_url', null, ['class' => $errors->has('store_url') ? 'validate invalid' : 'validate']) !!}
								<label for="store_url">PlayStore Url (Android)</label>
								<p class="form-error">{{ $errors->first('store_url') }}</p>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								{!! Form::url('apple_url', null, ['class' => $errors->has('apple_url') ? 'validate invalid' : 'validate']) !!}
								<label for="store_url">Apple Store Url (iOS)</label>
								<p class="form-error">{{ $errors->first('apple_url') }}</p>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								{!! Form::url('website_url', null, ['class' => $errors->has('website_url') ? 'validate invalid' : 'validate']) !!}
								<label for="website_url">Website Url</label>
								<p class="form-error">{{ $errors->first('website_url') }}</p>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								{!! Form::url('direct_url', null, ['class' => $errors->has('direct_url') ? 'validate invalid' : 'validate']) !!}
								<label for="direct_url">Direct Download Link</label>
								<p class="form-error">{{ $errors->first('direct_url') }}</p>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								{!! Form::text('developer', null, ['class' => $errors->has('developer') ? 'validate invalid' : 'validate']) !!}
								<label for="developer">Developer</label>
								<p class="form-error">{{ $errors->first('developer') }}</p>
							</div>
						</div>

					</div> <!-- end of div.col s12 m6 -->

					<div class="col s12 m6">
						<div class="row">
							<div class="input-field col s12">
								<p for="type">Application Type</p>
								@foreach (['android' => 'Android App', 'ios' => 'iOS App', 'web' => 'Web'] as $key => $value)
								<p>
									@if (isset($model) && $model->includeType($key))
									<input name="type[{{ $key }}]" type="checkbox" id="{{ $key }}" class="filled-in" checked="checked" />
									@else
									<input name="type[{{ $key }}]" type="checkbox" id="{{ $key }}" class="filled-in" />
									@endif
							    	<label name="type[{{ $key }}]" for="{{ $key }}">{{ $value }}</label>
							    </p>
								@endforeach
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s12">
								{!! Form::textarea('description', null, ['class' => 'materialize-textarea', 'rows' => 15]) !!}
								<label for="description">Application Description</label>
							</div>
						</div>
					</div> <!-- end of div.col s12 m6 -->

				</div> <!-- end of div.row -->

				

				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="action">
							Submit
	  					</button>

	  					<a class="waves-effect waves-teal btn-flat blue-text text-darken-2" href="{{ route('showcase') }}">Cancel</a>
					</div>
				</div>

				{!! Form::close() !!}
			</div> <!-- end of div#login -->

		</div> 
	</div>

@endsection

@section('scripts')
	// Make dropdown with material
	$('select').material_select();
@endsection
