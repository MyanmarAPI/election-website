@extends('layouts.default')

@section('title', 'Showcase App')

@section('content')
	
	@if (Auth::user()->isAdmin())
		@include('partials.admin-toolbar')
	@else
		@include('partials.user-toolbar')
	@endif
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12" id="admin-apps">
				<h4>
					Application Showcase

					@if ( ! Auth::user()->isAdmin())
					<small class="right">
						<a href="{{ route('showcase.create') }}"
						class="waves-effect waves-indigo btn-flat indigo-text text-size-small">
							<i class="material-icons">add</i> Create New
						</a>
					</small>
					@endif
				</h4>
				
				@if ( ! Auth::user()->isAdmin())
				<div class="img-info">
					<strong>Requirement for showcase application</strong>
					<ul class="bullet-list">
						<li>Application Name</li>
						<li>Application Description</li>
						<li>Store URL (Android, iOS)</li>
						<li>Website URL (Web App)</li>
						<li>Icon Image (512x512)</li>
						<li>Screenshots Image (Min 2)</li>
					</ul>
				</div>
				@endif

				@if ( $apps->isEmpty())
				<div class="empty">
					<p class="center-align">
						Showcase is empty!
					</p>
				</div>
				@else
					
					@if (Auth::user()->isAdmin())
						@include('showcase.dashboard.partials.admin_table')
					@else
						@include('showcase.dashboard.partials.user_table')
					@endif

				@endif
			</div>
		</div>
	</div>
@endsection