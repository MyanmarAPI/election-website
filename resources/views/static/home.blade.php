@extends('layouts.default')

@section('title', 'Home')

@section('hero')
	<div class="hero center white">
		<div class="row app-container mg-top">

            <div class="row info-row">
                <div class="col s12 center">
                    <h4>MVoter 2015</h4> 
                    <p>First Winner of MaePaySoh Hack Challenge</p>
                    <p><img style="width:40%;" src="/uploads/20151005140619web_hi_res_512.png" alt="MVoter 2015"></p>
                    <h5>Developed By PopStack</h5>
                
                    <div class="info-desc">
                        <p>ရွေးကောက်ပွဲဝင်ကိုယ်စားလှယ်လောင်းများ၊ နိုင်ငံရေးပါတီများအကြောင်းနှင့် မည်သို့ဆန္ဒမဲဲပေးရမည်ကို ပထမဆုရ app တွင်လေ့လာကြည့်ရှုသင်ယူနိုင်ပါပြီ။</p>
						<p>Learn about your candidates and parties, and how to vote, in this first-prize winning app.</p>
                        <p>Application Type : Android App</p>
                    </div>
                    <div class="info-dl">
                        <a href="http://bit.ly/mvoter-apk" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">file_download</i>Direct Download
                        </a>

                        <a href="https://play.google.com/store/apps/details?id=com.popstack.mvoter2015" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">cloud_download</i>Download From Store
                        </a>
                    </div>
                       
                </div>
         	</div>

         	<div class="row info-row">
                <div class="col s12 center">
                    <h4>Mae</h4> 
                    <p>Second Winner of MaePaySoh Hack Challenge</p>
                    <p><img style="width:40%;" src="/uploads/20151002124352ic_launcher-web.png" alt="Mae"></p>
                    <h5>Developed By SSYGM (MMAUG)</h5>
                
                    <div class="info-desc">
                        <p>နိုင်ငံရေးပါတီများအကြောင်း၊ ကိုယ်စားလှယ်လောင်းများအားနှိုင်းယှဉ်ခြင်းနှင့် မဲတံဆိပ်လေ့ကျင့်ရိုက်နှိပ်ခြင်းကို လေ့လာကြည့်ရှုသင်ယူနိုင်ပါပြီ။</p>
						<p>Learn about parties, compare candidates, and practice stamping the ballot.</p>
                        <p>Application Type : Android App</p>
                    </div>
                    <div class="info-dl">
                        <a href="https://bitly.com/mae-latest-apk" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">file_download</i>Direct Download
                        </a>

                        <a href="https://play.google.com/store/apps/details?id=org.mmaug.mae" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">cloud_download</i>Download From Store
                        </a>
                    </div>
                       
                </div>
         	</div>

         	<div class="row info-row">
                <div class="col s12 center">
                    <h4>Maepaysoh (မဲေပးစို႔)</h4> 
                    <p>Third Winner of MaePaySoh Hack Challenge</p>
                    <p><img style="width:40%;" src="/uploads/20151005102132mps_appicon.png" alt="Mae"></p>
                    <h5>Developed By Koe Koe Wave Team</h5>
                
                    <div class="info-desc">
                        <p>ရွေးကောက်ပွဲဝင်ကိုယ်စားလှယ်လောင်းများနှှင့် နိုင်ငံရေးပါတီများ၏ရပ်တည်ချက်အနေအထားများကို လေ့လာကြည့်ရှုသင်ယူနိုင်ပါပြီ။</p>
						<p>Learn about candidates and political party policy positions.</p>
                        <p>Application Type : Android &amp; Web App</p>
                    </div>
                    <div class="info-dl">
                        <a href="https://play.google.com/store/apps/details?id=com.koekoetech.maepaysoh" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">cloud_download</i>Store Download
                        </a>

                        <a href="http://vote.koekoetech.com/" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">web</i>Access Web
                        </a>
                    </div>
                       
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
