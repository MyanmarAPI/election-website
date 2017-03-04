@extends('layouts.default')

@section('title', 'Home')

@section('hero')
	<div class="hero center white">
		<div class="row app-container mg-top">
            <div class="col s12 l12 center">
                <h4>MVoter 2017</h4> 
                <p>
                    <img style="width:200px;" src="http://maepaysoh.org/uploads/201703021307022017_Icon_512x512.png" alt="MVoter 2017">
                </p>
                <h5>Developed By PopStack</h5>
            	<div class="info-dl">
                    <p>
                        <a href="http://bit.ly/mvoter-android" data-ga-event="Download|MVoter 2017|PlayStore" target="_blank">
                            <img alt="Get it on Google Play"
                               src="https://play.google.com/intl/en_us/badges/images/generic/en-play-badge.png" class="google_play_badge" />
                        </a>
                        <a href="http://bit.ly/mvoter-ios" 
                            data-ga-event="Download|MVoter 2017|AppleStore"
                            style="display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg) no-repeat;width:165px;height:40px;" target="_blank"></a>
                    </p>
                    <p>
                        <a href="http://bit.ly/mvoter-apk" 
                            target="_blank"
                            data-ga-event="Download|MVoter 2017|DirectDownload"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">file_download</i>apk ရယူရန်
                        </a>
                        <a href="http://web.mvoterapp.com/"
                            target="_blank"
                            data-ga-evnet="ViewAppWebsite|MVoter 2017"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">web</i>Web App</a>    
                    </p>
                </div>
                <div class="info-desc">
                    <p>
                        The 2017 by elections will be held on April 1.  There are approximately 2.3 million voters who can go to the polls to choose from among 94 candidates (including 7 independents) and 24 political parties for 19 vacant seats.  Voting will take place in 8 states and regions:  Yangon, Kayah, Chin, Mon Rakhine, Shan Bago, and Sagaing.  The MaePaySoh (Let’s Vote) voter education initiative, developed for the 2015 general elections, has been updated for the 2017 by elections and provides information on candidates, political parties, polling stations, and voter information.   
                            
                    </p>
                    <p>
                        MVoter2017 mobile and web apps are developed by Pop Stack and The Asia Foundation, with the generous support of Australian Aid. 
                    </p>
                    <p>
                        Download the apps, and connect with us on <a href="https://www.facebook.com/MaePaySoh/" target="_blank">Facebook</a>!    
                    </p>
                	
                </div>
            </div>
    </div>
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
