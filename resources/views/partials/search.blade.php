@if(isset($routeName) && isset($placeHolder))
	<div class="col s12">
		{!! Form::open([
			'route' => $routeName, 
			'autocomplete' => 'false',
			'method' => 'GET'
		]) !!}
		<input name="s" type="search" placeholder="{{ $placeHolder }}">
		{!! Form::close() !!}
	</div>
@endif