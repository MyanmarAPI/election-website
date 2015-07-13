@extends('layouts.default')

@section('title', 'Members')

@section('content')

	@include('partials.admin-toolbar', ['routeName' => 'search::member', 'placeHolder' => 'Search Member...'])
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12">
				<h4>
					Admin Members 
					<small class="right">
						<a href="{{ route('member.create') }}"
						class="waves-effect waves-teal btn-flat indigo-text text-size-small">
							<i class="material-icons">add</i> Create New Member
						</a>
					</small>
				</h4>

				@if ( $members->isEmpty())
				<div class="empty">
					<p class="center-align">
						Admin Member is empty! <br><br>
					</p>
				</div>
				@else
				<table class="bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<th width="300px">Actions</th>
						</tr>					
					</thead>
	
					@foreach ( $members as $member)

					<tr>
						<td>{{ $member->name }}</td>
						<td>{{ $member->email }}</td>
						<td>{{ ($member->status == 'a') ? 'Active' : 'Banned' }}</td>
						<td>
							@if ($member->status == 'a')
							<a title="Ban" href="{{ route('user.ban', $member->id) }}" 
							class="waves-effect waves-light btn orange">
								<i class="material-icons">lock</i>
							</a>
							@else
							<a title="Remove Ban" href="{{ route('user.unban', $member->id) }}" 
							class="waves-effect waves-light btn indigo">
								<i class="material-icons">lock_open</i>
							</a>
							@endif

							<a title="Downgrade to User" href="{{ route('action.downgrade', $member->id) }}" 
							class="waves-effect waves-light btn blue-grey">
								<i class="material-icons">swap_vert</i>
							</a>

							<a title="Delete" href="{{ route('member.delete', $member->id) }}" 
							class="waves-effect waves-light btn confirm_delete red">
								<i class="material-icons">delete</i>
							</a>
						</td>
					</tr>

					@endforeach
					
				</table>
				@endif

				{!! $members->render() !!}
			</div>
		</div>
	</div>
@endsection