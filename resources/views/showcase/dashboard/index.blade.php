@extends('layouts.default')

@section('title', 'Showcase App')

@section('content')

	@include('partials.admin-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="admin-apps">
				<h4>Showcase Applications</h4>

				@if ( $apps->isEmpty())
				<div class="empty">
					<p class="center-align">
						Showcase is empty!
					</p>
				</div>
				@else
				<table class="bordered">
					<thead>
						<tr>
							<th>Application Name</th>
							<th>Application Type</th>
							<th>Application Status</th>
							<th width="200px">Actions</th>
						</tr>					
					</thead>
	
					@foreach ( $apps as $app)

					<tr>
						<td>{{ $app->name }}</td>
						<td>{{ $app->type }}</td>
						<td>{{ ($app->published == 'p') ? 'Publish' : 'Draft' }}</td>
						<td>
							@if ($app->published == 'p')
							<a title="Draft" href="{{ route('showcase.draft', $app->id) }}" 
							class="waves-effect waves-light btn red">
								<i class="material-icons">visibility_off</i>
							</a>
							@else
							<a title="Publish" href="{{ route('showcase.publish', $app->id) }}" 
							class="waves-effect waves-light btn green">
								<i class="material-icons">visibility</i>
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