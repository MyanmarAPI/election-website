var current_data = [];

var default_data = [
	{
		period : "2015-01-01",
		value : 0
	}
];

var graph = MorrisGraph('report-analytics', default_data);

var range = $('#analytic-date');

function fetchData(analyticHost, apiKey, apiSecret) {
	//Get Data 
	$.ajax(analyticHost + 'all/today', {
		crossDomain : true,
		headers : {
			'X-API-KEY' : apiKey,
			'X-API-SECRET' : apiSecret
		}
	})
	.done(function(data){

		current_data = data;

		graph.setData(data.hourly.data);

		range.text(data.hourly.date_range);

		$( ".loading .spinner" ).hide();

		var t_hits = new Vue({
			  el: '#total_hits',
			  data: {
			  	total_hits : current_data.total_hits
			  }
		});

	});
}

$('.analytic-btn').click(function(e){
	e.preventDefault();
	var type = $(this).data('type');
	var newdata = current_data[type]['data'];
	graph.setData(newdata);
	range.text(current_data[type]['date_range']);
});

$( document ).ajaxStart(function() {
  $( ".loading .spinner" ).show();
});

function MorrisGraph(element, data) {

	return new Morris.Line({
	  element: element,
	  data: data,
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