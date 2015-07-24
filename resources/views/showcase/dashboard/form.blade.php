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
					<h4 class="box-header cyan-text text-darken-3">Crete new showcase</h4>

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

						<div class="row">
							<div class="input-field col s12">
								{!! Form::url('url', null, ['class' => $errors->has('url') ? 'validate invalid' : 'validate']) !!}
								<label for="name">Application Url</label>
								<p class="form-error">{{ $errors->first('url') }}</p>
							</div>
						</div>

					</div> <!-- end of div.col s12 m6 -->

					<div class="col s12 m6">
						<div class="row">
							<div class="input-field col s12">
								{!! Form::select('type', ['android' => 'Android App', 'ios' => 'iOS App', 'web' => 'Web', 'window' => 'Window Mobile']) !!}
								<label>Application Type</label>
								<p class="form-error">{{ $errors->first('type') }}</p>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s12">
								{!! Form::textarea('description', null, ['class' => 'materialize-textarea']) !!}
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
