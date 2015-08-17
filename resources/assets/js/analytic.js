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

		range.text(data.hourly.date_range);

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
	range.text(current_data[type]['date_range']);
});

$( document ).ajaxStart(function() {
  $( ".loading .spinner" ).removeClass('hide');
});

$('.analytic-date-range').on('focus', function(){
	$(this).pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 10 // Creates a dropdown of 15 years to control year
	});
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