// Sidebar Navigation for Mobile View
$(".button-collapse").sideNav();

 // Delete Confimation Box
$('.confirm_delete').on('click', function(e){
	//return confirm("Are you sure you want to delete this data?");
	//
	e.preventDefault();

	var url = $(this).attr('href')
		isAjax = $(this).data('ajax');

	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this data!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#e51400",
		closeOnConfirm: false,
		closeOnCancel: false
	}, function(isConfirm) {
		if ( isConfirm) {
			if ( isAjax == true) {
				$.ajax(url, {
					success : function(data) {
						swal("Deleted!", "Your data has been deleted.", "success");
					},
					error : function() {
						swal("Cancelled", "Your data file is safe :)", "error");
					}
				});
			}

			window.location = url;
		} else {
			swal.close();
		}
	});
});

// Send Google Analytics Event
$("[data-ga-event]").on('click', function(event){
  var args = ['send', 'event'];
  args = args.concat( $(this).data('ga-event').split("|") );
  ga.apply(null, args);
});