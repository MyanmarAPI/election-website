@extends('layouts.default')

@section('title', 'Applications')

@section('content')

	@include('partials.admin-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="admin-apps">
				<h4>Register Applications</h4>

				@if ( $applications->isEmpty())
				<div class="empty">
					<p class="center-align">
						Application is empty!
					</p>
				</div>
				@else
				<table class="bordered">
					<thead>
						<tr>
							<th>Application Name</th>
							<th>Application Key</th>
							<th>Application Type</th>
							<th>Created By</th>
							<th width="200px">Actions</th>
						</tr>					
					</thead>
	
					@foreach ( $applications as $app)

					<tr>
						<td>{{ $app->name }}</td>
						<td><div class="app-key fixed-width-200 truncate">{{ $app->key }}</div></td>
						<td>{{ $app->type }}</td>
						<td><span>{{ $app->user->name }}</span></td>
						<td>
							@if ($app->disable)
							<a title="Change Status" href="{{ route('application.enable', $app->id) }}" 
							class="waves-effect waves-light btn orange">
								<i class="material-icons">clear</i>
							</a>
							@else
							<a title="Change Status" href="{{ route('application.disable', $app->id) }}" 
							class="waves-effect waves-light btn indigo">
								<i class="material-icons">done</i>
							</a>
							@endif
						</td>
					</tr>

					@endforeach
					
				</table>
				@endif
			</div>
		</div>
	</div>
@endsection