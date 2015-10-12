@extends('layouts.default')

@section('title', 'Applications')

@section('content')

	@include('partials.admin-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="admin-apps">
				<h4>Register Applications</h4>

				@include('partials.search', ['routeName' => 'search::application', 'placeHolder' => 'Search Application By Key or Name...'])
				
				@if ( ! isset($hideFilter))
				<div class="row">
					<div class="col s4">
						<a href="?type=web" class="waves-effect waves-light btn-large indigo darken-2">Web Applications Only</a>
					</div>
					<div class="col s4">
						<a href="?type=android" class="waves-effect waves-light btn-large indigo darken-2">Android Applications Only</a>
					</div>
					<div class="col s4">
						<a href="?type=ios" class="waves-effect waves-light btn-large indigo darken-2">iOS Applications Only</a>
					</div>
				</div>
				@endif

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
							<th>#</th>
							<th>Application Name</th>
							<th>Application Key</th>
							<th>Application Type</th>
							<!-- <th>User Count</th> -->
							<th>Created By</th>
							<th width="200px">Actions</th>
						</tr>					
					</thead>
	
					@foreach ( $applications as $app)

					<tr>
						<td>
							@if ($app->disable)
							<i class="material-icons red-text text-accent-4" title="Application is disable">power_settings_new</i>
							@else
							<i class="material-icons light-green-text text-accent-4" title="Application is running">power_settings_new</i>
							@endif
						</td>
						<td>{{ $app->name }}</td>
						<td>
							<div class="app-key fixed-width-200 truncate">{{ $app->key }}</div>
						</td>
						<td>{{ $app->type }}</td>
						<!-- <td>{{ $app->tokens->count() }}</td> -->
						<td>
							@if ( $app->user)
							<span class="tooltipped" data-position="top" data-delay="50" data-tooltip="{{ $app->user->email }}">
								{{ $app->user->name }}
							</span>
							@else
							<span class="tooltipped" data-position="top" data-delay="50" data-tooltip="Unknown">
								Unknown
							</span>
							@endif
						</td>
						<td>
							<a title="View Application" class="waves-effect waves-light btn"
								href="{{ route('application.view', $app->id) }}">
								<i class="material-icons">visibility</i>
							</a>
							@if ($app->disable)
							<a title="Change Status" href="{{ route('application.enable', $app->id) }}" 
							class="waves-effect waves-light btn red">
								<i class="material-icons">power_settings_new</i>
							</a>
							@else
							<a title="Change Status" href="{{ route('application.disable', $app->id) }}" 
							class="waves-effect waves-light btn red">
								<i class="material-icons">power_settings_new</i>
							</a>
							@endif
						</td>
					</tr>

					@endforeach
					
				</table>
				
					@if ( isset($query) && ! empty($query))
						{!! $applications->appends($query)->render() !!}
					@else
						{!! $applications->render() !!}
					@endif
				
				@endif
			</div>
		</div>
	</div>

	<div id="key-model" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Application Key</h4>
      <p class="app-key center-align" id="model-key-text"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
@endsection

@section('scripts')
	// View full application key
	$('.key-button').on('click', function(e) {
		e.preventDefault();
		$('#model-key-text').text($(this).data('key-text'));
		$('#key-model').openModal();
	});
@endsection