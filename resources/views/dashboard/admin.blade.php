@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
	
	@include('partials.admin-toolbar')
	
	<div class="row app-container">

		<div class="row mg-top" id="total-view">
			<div class="col s4 total-block">
				<h5>Users</h5>
					
				<div class="total indigo-text">
					{{ $total_users }}
				</div>
				
			</div>

			<div class="col s4 total-block">
				<h5>Admins</h5>
					
				<div class="total indigo-text">
					{{ $total_admins }}
				</div>
				
			</div>

			<div class="col s4 total-block">
				<h5>Applications</h5>
					
				<div class="total indigo-text">
					{{ $total_apps }}
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col s12" id="analytics-view">
				<h4>Analytics</h4>
				<div id="analytic-links">
					<a href="#" id="getHourly"data-type="hourly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Hourly</a>
					<a href="#" id="getDaily" data-type="daily" class="analytic-btn waves-effect waves-light btn indigo darken-2">Daily</a>
					{{-- <a href="#" id="getWeekly" data-type="weekly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Weekly</a> --}}
					<a href="#" id="getMonthly" data-type="monthly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Monthly</a>
				</div>
				<div id="analytic-date-range">
					<strong><span id="analytic-date">{{ date('Y-m-d') }}</span></strong>
				</div>
				<div class="loading"><i class="fa fa-spinner fa-spin spinner" style="display:none;"></i></div>

				<div id="report-analytics" style="height: 250px;"></div>

				<ul class="collapsible" data-collapsible="accordion">
				    <li>
				      <div class="collapsible-header"><i class="material-icons">info</i>Total Hits by Request Info</div>
				      <div class="collapsible-body" id="total_hits">
				      	<div class="row">
				      		<div class="col s6" v-repeat="item: total_hits">
				      			<h5 v-text="item.title"></h5>
				      			<table class="bordered">
				      				<tr>
				      					<th v-text="item.title"></th>
				      					<th>Hits</th>
				      				</tr>
				      				<tr v-repeat="item.data">
				      					<td v-text="info"></td>
				      					<td v-text="hit"></td>
				      				</tr>
				      			</table>
				      		</div>
				      	</div>
				      </div>
				    </li>
				</ul>
				
			</div>
		</div>

		<div class="row">
			<div class="col m6 s12">
				<h4>Latest Register User</h4>

				<ul class="collection">
					@foreach ($users as $u)
					<li class="collection-item avatar">
						<img src="{{ $u->getProfileImage() }}" alt="" class="circle">
						<span class="title">{{ $u->name }}</span>
						<p>Registered At : {{ $u->created_at->format('d-M-Y') }}</p>
					</li>
					@endforeach
				</ul>
			</div>

			<div class="col m6 s12">
				<h4>Latest Register Application</h4>

				<ul class="collection">
					@foreach ($applications as $a)
					<li class="collection-item avatar">
						@if ($a->type == 'android')
						<i class="circle green app-type-text" title="Android">A</i>
						@elseif ($a->type == 'ios')
						<i class="circle blue app-type-text" title="iOS">I</i>
						@else
						<i class="circle red app-type-text" title="Web">W</i>
						@endif
						<span class="title">{{ $a->name }}</span>
						<p>Registered At : {{ $a->created_at->format('d-M-Y') }}</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('foot-js')

	<script type="text/javascript" src="{{ url('js/analytic.js') }}"></script>

	<script>
		var analyticHost = "{{ config('analytics.base_url') }}";
		var apiKey = "{{ config('analytics.X-API-KEY') }}";
		var apiSecret = "{{ config('analytics.X-API-SECRET') }}";

		fetchData(analyticHost, apiKey, apiSecret);

	</script>

@endsection