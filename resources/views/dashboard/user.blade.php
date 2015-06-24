@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s12" id="user-dashboard">
			<h2>Dashboard</h2>

			{{ $user }}
		</div>
	</div>
@endsection