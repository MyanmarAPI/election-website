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
			@include('partials.analytic-views')
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

		fetchData('{{ route('api.analytic.default') }}');

		fetchTotalHits('{{ route('api.analytic.total_hits') }}');

	</script>

@endsection