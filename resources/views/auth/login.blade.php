@extends('front.template')

@section('main')
  <div class="container" style="margin-top:10%">
			<div class="row">
				<div class="col s12 blue grey white-text center-align z-depth-3">
					<h4> Nanna  Youtube Auto Subscribers</h4>
 
				</div>
				<div class="col s10 offset-s1 z-depth-3 grey lighten-3">
					<br>
					<h5> Method Login into Nanna  Youtube Auto Subscribers </h5>
					<p>You can Login to our site using your Facebook Credential. Please keep in mind that we dont collect your account information. We only Access to your facebook account ONE TIME for generating your Access Token Only. so in other word. Your Account is Safe.
					</p>
                                        
                                        <a href="{!!$loginUrl!!}" class="btn btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
                                            <span class="fa fa-google-plus"></span> Sign in with Google
                                          </a>				
                                        <br>
                                        <br>
		
                                        
			</div>
    </div>


@stop


