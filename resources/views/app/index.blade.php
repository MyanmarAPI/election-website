@extends('layouts.default')

@section('title', 'Applications')

@section('content')

	@include('partials.admin-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="admin-dashboard">
				<h4>Applications</h4>

				@if ( $applications->isEmpty())
				<div class="empty">
					<p class="center-align">
						Application is empty! <br><br>
						<a class="waves-effect waves-light btn" href="{{ route('application.create') }}">
							<i class="mdi-content-add left"></i>Create New Application
						</a>
					</p>
				</div>
				@else
				<table class="bordered">
					<thead>
						<tr>
							<th>Application Name</th>
							<th>Application Key</th>
							<th>Application Type</th>
							<th width="200px">Actions</th>
						</tr>					
					</thead>
	
					@foreach ( $applications as $app)

					<tr>
						<td>{{ $app->name }}</td>
						<td><span class="app-key">{{ $app->key }}</span></td>
						<td>{{ $app->type }}</td>
						<td>
							<a title="Edit" href="{{ route('application.edit', $app->id) }}" 
							class="waves-effect waves-light btn indigo">
								<i class="material-icons">edit</i>
							</a>
							<a title="Delete" href="{{ route('application.delete', $app->id) }}" 
							class="waves-effect waves-light btn confirm_delete red">
								<i class="material-icons">delete</i>
							</a>
						</td>
					</tr>

					@endforeach
					
				</table>
				@endif
			</div>
		</div>
	</div>
@endsection