@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
	
	@include('partials.admin-toolbar')
	
	<div class="row app-container">

		<div class="row">
			<div class="col s12" id="analytics-view">
				<h4>Analytics</h4>
					
				<div class="ga-graph valign-wrapper">
					<h5 class="valign center grey-text text-lighten-1" style="width:100%;">TODO : Analytics Graph</h5>
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col s6">
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

			<div class="col s6">
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