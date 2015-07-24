@extends('layouts.default')

@section('content')

	<div class="row app-container mg-top">
		<div class="col s12">

			<div class="row">
				<h4>Upload Image for Showcase Application</h4>
				<div class="col s9">			
					<form action="{{ route($route, $id) }}" class="dropzone" id="image-uploader">
		      			<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		      			<div class="dz-message">
							Drop files here or click to upload.<br />
							<span class="note">(Upload image file for showcase application)</span>
		  				</div>
		      		</form>	
				</div>

				<div class="col s3">
					<a href="{{ route('showcase') }}" class="btn">Back To Showcase</a>
				</div>
			</div> <!-- end of div.row -->

      		<div id="image-container">
      			@if( isset($for))
      				@if ( ! is_null($showcase->screenshots))
      				<ul id="screenshots-lists">
      				@foreach($showcase->screenshots as $s)
      					<li>
							<img src="{{ url($s) }}" >
							<a class="red-text"
							href="{{ route('showcase.screenshotsRemove', ['id' => $showcase->id, 's' => $s]) }}">
								Remove Image
							</a>
						</li>
      				@endforeach
      				</ul>
      				@endif
      			@else
      				@if($showcase->icon)
					<h5>If you upload new image, current icon image will be remove.</h5>
					<img src="{{ url($showcase->icon) }}" >
					@endif
      			@endif
      		</div>

		</div>
	</div>
@endsection

@section('scripts')
	
	// Variable for uploading is 'icon' or 'screenshots'
	var IMAGE_FOR = '{{ isset($for) ? $for : 'icon'  }}';

	Dropzone.autoDiscover = false;

	$(function() {
		var myDropzone = new Dropzone("#image-uploader", {
			acceptedFiles: 'image/*'
			@if ( isset($maxFiles))
			,maxFiles: {{ $maxFiles }}
			@endif
		});

		myDropzone.on('success', function(file, res) {
			// If uploading for 'icon', we need to back showcase page
			if ( IMAGE_FOR == 'icon') {
				window.location.replace(window.location.origin + '/dashboard/showcase');
			} else {
				var screenshotRemoveUrl = '{{ route('showcase.screenshotsRemove', ['id' => $showcase->id]) }}';
				
				var temp = '<li>'
							+ '<img src="/' + res + '">'
							+ '<a class="red-text" href="' + screenshotRemoveUrl + '?s=' + res + '">'
							+ 'Remove Image'
							+ '</a>'
							+ '</li>';

				$('#screenshots-lists').append(temp);
			}
		});
	});

@endsection