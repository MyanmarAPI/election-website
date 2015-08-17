var current_data = [];

var default_data = [
	{
		period : "2015-01-01",
		value : 0
	}
];

var graph = MorrisGraph('report-analytics', default_data);

var range = $('#analytic-date');

function fetchData(url) {
	//Get Data 
	$.ajax(url)
	.done(function(data){

		current_data = data;

		graph.setData(data.hourly.data);

		$('#hourly-date-input').val(current_data['hourly']['date_range']['date']);

		$( ".loading .spinner" ).addClass('hide');

	});
}

function fetchSingleData(type, query_str) {

	var app = $('#analytic-app').val();
	if (app) {
		query_str = query_str+'&api_key='+app;
	};
	$.ajax(ANALYTIC_BASE+'/data/'+type+query_str)
	.done(function(data){
		current_data[type] = data;
		graph.setData(current_data[type]['data']);
		var date_range = current_data[type]['date_range'];
		setDateRange(date_range, type);
		$( ".loading .spinner" ).addClass('hide');
	});

}

function fetchTotalHits(url) {
	$.ajax(url)
	.done(function(data){
		new Vue({
			  el: '#total_hits',
			  data: {
			  	total_hits : data
			  }
		});
	});
}

$('.analytic-btn').click(function(e){
	e.preventDefault();
	var type = $(this).data('type');
	var newdata = current_data[type]['data'];
	graph.setData(newdata);
	$('.date-range-input').hide();
	var date_range = current_data[type]['date_range'];
	setDateRange(date_range, type);
	$('#'+type+'-date-input-wrapper').show();
	//range.text(current_data[type]['date_range']);
});

function setDateRange(date_range, type)
{
	if (type == 'hourly') {
		$('#hourly-date-input').val(date_range['date']);
	} else {
		$('#'+type+'-date-from').val(date_range['from']);
		$('#'+type+'-date-to').val(date_range['to']);
	};
}

//Get Analytic Data by Application
$('#analytic-app').on('change', function(){
	var analytic_app = $(this).val();
	fetchData(ANALYTIC_BASE+'/data/default?api_key='+analytic_app);
	if (analytic_app) {
		fetchUUcount(ANALYTIC_BASE+'/unique-user-count?api_key='+analytic_app);
	} else {
		$('#uu_count_wrapper').hide();
	}
});

//Hourly Data by Date
$('#hourly-date-input').on('change', function(){
	var date = $(this).val();
	fetchSingleData('hourly', '?date='+date);
});

//Daily and Monthly by Date 
$('.date-set-btn').on('click', function(e){
	e.preventDefault();
	var type = $(this).data('type');
	var from = $('#'+type+"-date-from").val();
	var to = $('#'+type+"-date-to").val();
	fetchSingleData(type, '?from='+from+'&to='+to);
});

$( document ).ajaxStart(function() {
  $( ".loading .spinner" ).removeClass('hide');
});

$('.analytic-date-range').pickadate({
	format: 'yyyy-mm-dd',
	closeOnSelect: true,
    selectMonths: true, 
    selectYears: 10,
    max: $(this).attr('max')
});

function fetchUUcount(url) {
	$.ajax(url)
	.done(function(data){
		$('#uu_count').text(data.unique_user);
		$('#uu_count_wrapper').show();
	});
}

function MorrisGraph(element, data) {

	return new Morris.Line({
	  element: element,
	  data: data,
	  smooth: false,
	  xkey: 'period',
	  ykeys: ['value'],
	  labels: ['Hits']
	});

}

function VueInit(element, resource_data) {

	return new Vue({
	  el: element,
	  data: {
	  	list : resource_data
	  }
	});

}