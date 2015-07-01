@extends('layouts.default')

@section('title', 'Users')

@section('content')

	@include('partials.admin-toolbar')
	
	<div class="row app-container mg-top white-container">
		<div class="row">
			<div class="col s12">
				<h4>Users</h4>

				@if ( $users->isEmpty())
				<div class="empty">
					<p class="center-align">
						Users is empty! <br><br>
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
	
					@foreach ( $users as $user)

					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ ($user->status == 'a') ? 'Active' : 'Banned' }}</td>
						<td>
							@if ($user->status == 'a')
							<a title="Ban" href="{{ route('user.ban', $user->id) }}" 
							class="waves-effect waves-light btn orange">
								<i class="material-icons">lock</i>
							</a>
							@else
							<a title="Remove Ban" href="{{ route('user.unban', $user->id) }}" 
							class="waves-effect waves-light btn indigo">
								<i class="material-icons">lock_open</i>
							</a>
							@endif

							<a title="Promote to Admin" href="{{ route('action.promote', $user->id) }}" 
							class="waves-effect waves-light btn indigo">
								<i class="material-icons">swap_vert</i>
							</a>

							<a title="Delete" href="{{ route('user.delete', $user->id) }}" 
							class="waves-effect waves-light btn confirm_delete red">
								<i class="material-icons">delete</i>
							</a>
						</td>
					</tr>

					@endforeach
					
				</table>
				@endif

				{!! $users->render() !!}
			</div>
		</div>
	</div>
@endsection