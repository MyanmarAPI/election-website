@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')

	@include('partials.user-toolbar')
	
	<div class="row app-container">
		
		<div class="row">
			@include('partials.analytic-views')
		</div>
		
	</div>
@endsection

@section('foot-js')
	<script type="text/javascript" src="{{ url('js/analytic.js') }}"></script>
	
	<script>

		fetchData('{{ route('api.analytic.default') }}');

		$('#analytic-filter').on('change', function(){
			var analytic_app = $('#analytic-app').val();
			fetchData('{{ route('api.analytic.default') }}?api_key='+analytic_app);
			if (analytic_app) {
				fetchUUcount('{{ route('api.analytic.uu.count') }}?api_key='+analytic_app);
			} else {
				$('#uu_count_wrapper').hide();
			}
		});

	</script>

@endsection