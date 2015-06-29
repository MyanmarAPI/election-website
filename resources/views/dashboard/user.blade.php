@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')

	@include('partials.user-toolbar')
	
	<div class="row app-container">
		
		<div class="row">
			<div class="col s12" id="analytics-view">
				<h4>Analytics</h4>
					
				<div class="ga-graph valign-wrapper">
					<h5 class="valign center grey-text text-lighten-1" style="width:100%;">TODO : Analytics Graph</h5>
				</div>
				
			</div>
		</div>
		
	</div>
@endsection