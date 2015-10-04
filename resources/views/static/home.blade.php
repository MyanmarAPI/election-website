@extends('layouts.default')

@section('title', 'Home')

@section('hero')
	<div class="hero center white">
		<div class="row app-container mg-top">

        <div class="col s12 box-content white">
            <div class="row info-row">
                <div class="col s12 center">
                    <h4>{{ $app->name }}</h4> 
                    <p>Winner of MaePaySoh Hack Challenge</p>
                    <p><img width="300" src="/{{ $app->icon }}" alt="{{ $app->name }}"></p>
                    <h5>Developed By {{ $app->getDeveloper() }}</h5>
                
                    <div class="info-desc">
                        <p>{{ $app->description }}</p>
                        <p>{{ ucfirst($app->type) }} Application</p>
                    </div>
                    <div class="info-dl">
                        @if ( $app->direct_url)
                        <a href="{{ $app->direct_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            Direct Download
                        </a>
                        @endif

                        @if ( $app->store_url)
                        <a href="{{ $app->store_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">file_download</i>Download From Store
                        </a>
                        @endif

                        @if ( $app->website_url)
                        <a href="{{ $app->website_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            Visit To Website
                        </a>
                        @endif
                    </div>
                    <div class="info-slider">
                        @if ( ! empty($app->screenshots))
                            <ul class="screenshots">
                                @foreach($app->screenshots as $screenshot)
                                    <li>
                                        <img src="/{{ $screenshot }}" class="materialboxed">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                        
                </div>
            </div>

        </div> <!-- end of col s12 box-content white -->

    </div>
	</div> <!-- end of div.hero -->
	<div class="hero center">
		<div class="app-container row">
			<div class="col m8 offset-m2">
			<img src="{{ asset('img/mps-hackchallenge.png') }}" alt="MaePaySoh Hack Challenge" width="100%">
			
			<h4>Calling developers &amp; designers!</h4>
			<p class="large-text m8">Starting September 12, 2015, developers can use MaePaySoh API to power mobile and web applications to help voters access essential information about Myanmar’s general elections.</p>
			<p>
				<a class="waves-effect waves-light btn-large indigo darken-2" href="{{ url('hackchallenge') }}">
					<i class="material-icons left">trending_flat</i>Learn More
				</a>
			</p>
			</div>
		</div>
        <div class="clearfix"></div>
	</div> <!-- end of div.hero -->
	<div class="hero center white">
		<div class="app-container endpoints">		
			<h4>Try Our Endpoints</h4>
			<p>Build your app using our election data</p>
			<div class="row">
				<div class="col m3 s12">
					<a href="http://myanmarapi.github.io/endpoints/candidate.html" 
						data-ga-event="DocumentationLink|Click|CandidateEndpoint">
						<i class="material-icons md-36">supervisor_account</i>
					</a>
					<p>Candidate</p>
				</div>
				<div class="col m3 s12">
					<a href="http://myanmarapi.github.io/endpoints/party.html"
						data-ga-event="DocumentationLink|Click|PartyEndpoint">
						<i class="material-icons">account_balance</i>
					</a>
					<p>Party</p>
				</div>
				<div class="col m3 s12">
					<a href="http://myanmarapi.github.io/endpoints/geolocation.html"
						data-ga-event="DocumentationLink|Click|GeolocationEndpoint">
						<i class="material-icons">room</i>
					</a>
					<p>Geolocation</p>
				</div>
				<div class="col m3 s12">
					<a href="http://myanmarapi.github.io/endpoints/faq.html"
						data-ga-event="DocumentationLink|Click|FAQEndpoint">
						<i class="material-icons">question_answer</i>
					</a>
					<p>FAQ</p>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
	</div> <!-- end of div.hero -->

	
@endsection

@section('content')
	
    <div class="row app-container mg-top">
    	
		<div class="col m6 s12" id="develop-card">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
          			<span class="card-title grey-text text-darken-2">Develop</span>
					<p>If you want to develop an app using the API, 
					you need to register for your developer account.</p>
					<p>See detail guide for registration at documentation link.</p>
        		</div>
        		<div class="card-action">
          			<a href="#" class="cyan-text text-darken-2">How to Register</a>
        		</div>
      		</div> <!-- end of div.card -->
		</div> <!-- end of div#develop-card -->

		<div class="col m6 s12" id="contribute-card">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
          			<span class="card-title grey-text text-darken-2">Contribute</span>
					<p>MyanmarAPI is a completely open-source project. 
					You can find all the code for the API at our <a href="https://github.com/MyanmarAPI" target="_blank">GitHub organization page</a>.</p>
					<p>See detail guide for contributing at documentation link.</p>
        		</div>
        		<div class="card-action">
          			<a href="#" class="cyan-text text-darken-2">How to Contribute</a>
        		</div>
      		</div> <!-- end of div.card -->
		</div> <!-- end of div#contribute-card -->
		<div class="row app-container mg-top">
		<div class="col m6 s12">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
        			<span class="card-title grey-text text-darken-2">Connect</span>
        			<div class="fb-page" data-href="https://www.facebook.com/MaePaySoh" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MaePaySoh"><a href="https://www.facebook.com/MaePaySoh">Mae Pay Soh API</a></blockquote></div></div>
        		</div>
        	</div>

        	<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=92405487102";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
        </div>
		<div class="col m6 s12">
			<div class="card hoverable">
        		<div class="card-content grey-text text-darken-2">
        		<span class="card-title grey-text text-darken-2">Subscribe</span>
        		<p>Promise, we wouldn't spam you. We will keep you update with our trainings, schedule, new endpoints, and any activity related with our community movement</p>
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
				<form action="//maepaysoh.us11.list-manage.com/subscribe/post?u=204a4a1a60035339418a3ab82&amp;id=f9372063c7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
					
					<div class="wrapper">
						<input type="email" value="" name="EMAIL" placeholder="Email" class="required email" id="mce-EMAIL" style="display:inline-block; width:200px;">
						<input type="submit" value="Subscribe" name="subscribe" 
							id="mc-embedded-subscribe" class="btn indigo darken-2" style="background:none;border:0;"
							data-ga-event="Subscribe|Submit|SubmitTheSubscribeForm">
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_204a4a1a60035339418a3ab82_f9372063c7" tabindex="-1" value=""></div>
				    <div class="clear"></div>
				    </div>
				</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
				</div>
			</div>
		</div>
	</div>
		<!-- <div class="col s4">
			<h3>API Lists</h3>
		</div> -->
	</div>
@endsection

@section('scripts')
    $('.materialboxed').materialbox();
@endsection
