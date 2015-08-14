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