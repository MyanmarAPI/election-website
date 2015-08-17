<div class="col s12" id="analytics-view">
	<h4>Analytics</h4>
	<div id="analytic-links" class="col s6">
		<a href="#" id="getHourly"data-type="hourly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Hourly</a>
		<a href="#" id="getDaily" data-type="daily" class="analytic-btn waves-effect waves-light btn indigo darken-2">Daily</a>
		{{-- <a href="#" id="getWeekly" data-type="weekly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Weekly</a> --}}
		<a href="#" id="getMonthly" data-type="monthly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Monthly</a>
	</div>
	<div class="col s4">
	    <select class="browser-default" id="analytic-app">
	      <option value="" selected>All Applications</option>
	      @foreach ($opt_app as $app)
	      	<option value="{{ $app['key'] }}">{{ $app['name'] }}</option>
	      @endforeach
	    </select>
	</div>
	<div class="col s2">
		<div id="uu_count_wrapper" style="display:none;">Unique users : <span id="uu_count"></span></div>
	</div>
	<div id="analytic-filter" class="col s12">
		<div class="row">
			<form action="#" class="col s12" id="analytic-filter">
				<div class="col s6">
					<div class="date-range-input col s12" id="hourly-date-input-wrapper">
						<input name="analytic-date-from" type="date" class="datepicker analytic-date-range" id="hourly-date-input" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
					</div>
					<div class="date-range-input col s12" id="daily-date-input-wrapper" style="display:none;">
						<div class="col s5">
							<input name="daily-date-from" type="date" class="datepicker analytic-date-range" id="daily-date-from" value="">	
						</div>
						<div class="col s5">
							<input name="daily-date-to" type="date" class="datepicker analytic-date-range" id="daily-date-to" value="">	
						</div>
						<div class="col s2">
							<button id="daily-date-set" class="date-set-btn waves-effect waves-light btn indigo darken-2" data-type="daily">Set</button>
						</div>
					</div>
					<div class="date-range-input col s12" id="monthly-date-input-wrapper" style="display:none;">
						<div class="col s5">
							<input name="daily-date-from" type="date" class="datepicker analytic-date-range" id="monthly-date-from" value="">	
						</div>
						<div class="col s5">
							<input name="daily-date-to" type="date" class="datepicker analytic-date-range" id="monthly-date-to" value="">	
						</div>
						<div class="col s2">
							<button id="monthly-date-set" class="date-set-btn waves-effect waves-light btn indigo darken-2" data-type="monthly">Set</button>
						</div>
					</div>
				</div>
				<div class="col s6">
					
				</div>
			</form>
		</div>
	</div>

	<div class="loading"><i class="fa fa-spinner fa-spin spinner hide"></i></div>

	<div id="report-analytics" style="height: 250px;"></div>
	
	@if (Auth::user()->isAdmin())
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
	@endif
	<script>
		var ANALYTIC_BASE = '{{ url('api/v1/analytics') }}';
	</script>
</div>