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

	</script>

@endsection