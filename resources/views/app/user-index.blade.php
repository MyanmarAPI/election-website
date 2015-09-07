@extends('layouts.default')

@section('title', 'Applications')

@section('content')

	@include('partials.user-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="user-apps">
				
				<h4>Applications</h4>

				<div class="row">
					<div class="col l6 m6 s12">

						@if ( $applications->isEmpty())
						<div class="empty">
							<p class="center-align">
								Application is empty!
							</p>
						</div>
						@else
						<div class="row">
							@foreach($applications as $app)
							<div class="col s12">
								
								<div class="card">
									<div class="card-content">
										<span class="card-title grey-text text-darken-4">
											{{ $app->name }}
										</span>
										
										<p>{{ $app->description }}</p>
										
										<h6>API Key</h6>
										<div><span class="app-key">{{ $app->key }}</span></div>

										<h6>Application Type</h6>
										<p>{{ app_type($app->type) }}</p>
										
										<h6>Created at</h6>
										<p>{{ $app->created_at->format('M d, Y H:i A') }}</p>
									</div> <!-- end of div.card-content -->

									<div class="card-action">
										<a href="{{ route('application.view', $app->id) }}" class="indigo-text">
											View Detail
										</a>
										<a href="{{ route('application.edit', $app->id) }}" class="indigo-text">
											Edit
										</a>
										<a href="{{ route('application.delete', $app->id) }}" class="confirm_delete red-text">
											Delete
										</a>
									</div> <!-- end of div.card-action -->
								</div> <!-- end of div.card -->

							</div> <!-- end of div.col s12 -->
							@endforeach
						</div> <!-- end of div.row -->
						@endif
					</div> <!-- end of div.col l6 m6 s12 -->

					<div class="col l6 m6 s12">
						<p>To use MyamarAPI, you need a key for api request. Get key by making an application.</p>

						<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ route('application.create') }}">
							<i class="material-icons left">create</i>Create Application
						</a>

						<p>API Endpoint Lists</p>

						<ul class="collapsible" data-collapsible="accordion">
							@foreach (endpoint_lists() as $_k => $list)
							<li>
								<div class="collapsible-header">
									<i class="material-icons">assessment</i> {{ $list['name'] }}
								</div>
								<div class="collapsible-body">
									<p>{{ $list['desc'] }}</p>
									<p><a href="{{ $list['docs'] }}" target="_blank">Documentation</a></p>
								</div>
							</li>
							@endforeach
						</ul>
					</div>

				</div>

			</div> <!-- end of div#user-apps -->
		</div> <!-- end of div.row -->
	</div> <!-- end of div.app-container -->
@endsection

<style>
	.card h6 {
		font-weight: bold;
		margin-bottom: 10px;
	}
</style>