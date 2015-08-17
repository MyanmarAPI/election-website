<div class="col s12" id="analytics-view">
	<h4>Analytics</h4>
	<div id="analytic-links" class="col s12">
		<a href="#" id="getHourly"data-type="hourly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Hourly</a>
		<a href="#" id="getDaily" data-type="daily" class="analytic-btn waves-effect waves-light btn indigo darken-2">Daily</a>
		{{-- <a href="#" id="getWeekly" data-type="weekly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Weekly</a> --}}
		<a href="#" id="getMonthly" data-type="monthly" class="analytic-btn waves-effect waves-light btn indigo darken-2">Monthly</a>
	</div>
	{{-- <div class="col s6">
		<div class="col s6">
			<label for="input_text">From / Date</label>
			<input name="analytic-date-from" type="date" class="datepicker analytic-date-range" id="analytic-date-from">
		</div>
		<div class="col s6">
			<label for="input_text">To</label>
			<input name="analytic-date-to" type="date" class="datepicker analytic-date-range" id="analytic-date-to">
		</div>
	</div> --}}
	<div id="analytic-filter" class="col s12">
		<div class="row">
			<form action="#" class="col s12" id="analytic-filter">
				<div class="col s4">
				    <select class="browser-default" id="analytic-app">
				      <option value="" selected>All Applications</option>
				      @foreach ($opt_app as $app)
				      	<option value="{{ $app['key'] }}">{{ $app['name'] }}</option>
				      @endforeach
				    </select>
				</div>
				<div class="col s3" id="uu_count_wrapper" style="display:none;">Unique users : <span id="uu_count"></span></div>
			</form>
		</div>
	</div>
	<div id="analytic-date-range">
		<strong><span id="analytic-date">{{ date('Y-m-d') }}</span></strong>
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
	
</div>