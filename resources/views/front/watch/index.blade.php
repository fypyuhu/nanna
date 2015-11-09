@extends('front.template')

@section('headInclude')

<link rel="stylesheet" href="assets/video-js/video-jsd5f7.css?ver=2.0"/>
<script type="text/javascript" src="assets/video-js/videod5f7.js?ver=2.0"></script>
<script type="text/javascript" src="assets/video-js/video-plugins.js"></script>

<script>videojs.options.flash.swf = "assets/video-js/video-js.swf";</script>
        

@stop
@section('main')


<script type="text/javascript">
$(document).ready(function () {
	$('#DownloadPanel').click(function(event){
		event.preventDefault();
	
		var downloadPanel = $('#downloadtoggle');
		if(downloadPanel.data('visible')){
			
			downloadPanel.slideUp();	
			downloadPanel.data('visible', false);
			$('#DownloadPanel .toggle .fa-chevron-up').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		}else{
			$('#DownloadPanel .toggle .fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-up');
			downloadPanel.slideDown();
			downloadPanel.data('visible', true);
		}

	});
	$.fn.hasAttr = function hasAttr(name) {  
   return this.attr(name) !== undefined;
};
$('.vjs-control-bar').append('<div class="loop"><i class="fa fa-repeat"></i></div>');
	$('.loop').click(function() {   
		if( $( "video" ).hasAttr( "loop" ) ){
			$( "video" ).removeAttr( "loop" );
			$(this).removeClass( "loop-active" );
		} else {
			myPlayer = videojs("videoholder"); 
		    if(myPlayer.ended()){
			  myPlayer.play();
		    }
			$( "video" ).attr( "loop", "true" );
			$(this).addClass( "loop-active" );
		}
	});

$('.show-more').click(function() {   
		if( $(this).hasClass('closed') ) {
			$(this).removeClass('closed').html('Show less <span class="caret fa-rotate-180"></span>');
			$('#about').css({'height':'auto','overflow':'visible','background':'transparent'});
			$(this).addClass('margin-top-10');
		} else {
			$(this).addClass('closed').html('Show more <span class="caret"></span>');
			$('#about').css({'height':'','overflow':'hidden','background-image':'linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)'});
			$(this).removeClass('margin-top-10');
		}
	});

 
    $("#submit_report").click(function() { 
    	$('#submit_report').html('<i class="fa fa-spinner fa-spin"></i> Working...');
        var videoid='i8dPrAHqVFc';
        	post_data = {
                'subject'       : $('select[name=subject]').val(),
				 'videoid'           : videoid
            };
            $.post('process/report', post_data, function(response){  
                if(response.type == 'error'){  
                    output = '<div class="alert alert-dismissable alert-danger">'+response.text+'</div>';
                }else{
                    output = '<div class="alert alert-dismissable alert-success">'+response.text+'</div>';
                }
                $('#formbody').hide().html(output).slideDown();
            }, 'json');
    });

        $('#commentsOrderButton .commentsOrderTop, #commentsOrderButton .commentsOrderNew').click(function(e){
			e.preventDefault();
			commentsOrder = $(this).data('order');
			$('#commentsOrder').html($(this).text());
			$('#comments-msg').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
			$('.more-comments').hide();
			$('#comments-msg').show();
			$('#ytcomments').slideUp().html('').slideDown();
			loadcomments(null, commentsOrder);
		});
	Loadrelated(null,'true');
	  $( ".loadrelated" ).click(function(){
	  Loadrelated($('.loadrelated').data('next'));
	});

	commentsOrder = "top";
    loadcomments(null, commentsOrder);

	$('.more-comments').click(function(e){  
	  e.preventDefault();
	  $('.more-comments').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
	  loadcomments($(this).data('nexttoken'), commentsOrder);	
	});
	
		
	myPlayer = videojs("videoholder"); 
	function playPause(){
		 if(myPlayer.paused()){
			 myPlayer.play();
		 }else{
			 myPlayer.pause();
		 }
	};
		myPlayer.on('ended', sharebox);
	function sharebox(){
		if( !$( "video" ).hasAttr( "loop" ) ){
			$('#sharebox').modal({show: true});
		}
	}
	
	$('body').keydown(function(event){
		if($('input, textarea').is(':focus')) {
		}else if($('.vjs-play-control').is(':focus')) {
			event.preventDefault();
		}else{
			if(event.keyCode == 32){
				event.preventDefault();
				playPause();
			}
		}
		});
	$('#disLikeButton').tooltip();
	$('#likeButton').tooltip();
});

 var videoid='i8dPrAHqVFc';
function loadcomments(next, order){
	$('.more-comments').addClass('disabled');
 $.ajax({
	  type: "POST",
	  url: 'process/comments',
	  data: {id:videoid, next:next, order: order },
	  dataType: "json",
		  success: function(response){
   				  if(response.error=="comments disabled" || response=="")
					{ 
					  $('#comments-msg').html('<i class="fa fa-ban" style="color: #B51515;"></i> Comments are disabled for this video.');
					}else if (response.error=="No Comment"){
					  $('#comments-msg').html('Be the first to write a comment on this video!')
					  $('#commentForm').slideDown();
				      $('.total-comments').html('<i class="fa fa-comments"></i>&nbsp;&nbsp;No comments yet').slideDown();
				      $('.commentstoptoggle').slideDown(); 
					} else{
					  $('#comments-msg').hide();
					  $('.more-comments').show();
					  $('#commentForm').slideDown();
					  $('#ytcomments').append(response.html);	
					  $('.total-comments, #commentsOrderButton, .commentstoptoggle').slideDown();    
					   if(response.nexttoken){
					       $('.more-comments').html('Show more comments').removeClass('disabled').data('nexttoken', response.nexttoken);
					   }else{
					       $('.more-comments').hide();
					   }	
                    }	
				},
		  error: function(XMLHttpRequest,textStatus,errorThrown) {
                        setTimeout(function(){
                         loadcomments(next, order);
                        },5000);    
                    }		    
			});
};
	

 var videoid='i8dPrAHqVFc';
function Loadrelated(token, ad){
				$('.loadrelated').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
				$('.loadrelated').addClass('disabled');
				$.ajax({
					type: "GET", 
					url: "process/getvideos",
					data: { type: 'related', id:videoid, token:token, ad:ad},
					dataType: "json",
					success: function(response){
					$('.loadrelated').hide(); 
					$(".message").hide();
					$('#sidebar').append(response.html);	
					if(response.nexttoken){
					  $('.loadrelated').html('Show more').removeClass('disabled').show().data('next', response.nexttoken);
					}else{
					  $('.loadrelated').hide();
					}
				},
		           error: function(XMLHttpRequest,textStatus,errorThrown) {
                        setTimeout(function(){
                         Loadrelated(token, ad);
                        },5000);    
                    }
			});
		}; 

		
		function failed(e) {
		   switch (e.target.error.code) {
			 case e.target.error.MEDIA_ERR_ABORTED:
			   break;
			 case e.target.error.MEDIA_ERR_NETWORK:
			   console.log("Video dropped part-way");
			   retry();
			   break;
			 case e.target.error.MEDIA_ERR_DECODE:
			   break;
			 case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
			   console.log("Network failed!");
			   retry();
			   break;
			 default:
			   break;
		   }
		 }
		 
		 var currTime = 0;
		 var progress = 0;
		 var myPlayer;
		 var playing = true;
		 
		 function retry(){
			var video = document.getElementsByTagName('video')[0];
			currTime = video.currentTime;
			progress = $('.vjs-play-progress').width();
			console.log("Trying from "+currTime+" ...");
			video.play();
			video.pause();
			$('.vjs-play-progress').width(progress);
			$('.vjs-big-play-button').hide();
			myPlayer = videojs("videoholder"); 
			setTimeout(seekNow,1000);
		 }
		 
		 function seekNow(){
		 	myPlayer.currentTime(currTime);
		 	myPlayer.play();
		 }
</script>
<div class="col-md-8 row-border">
<div class="margin-top-10">
<form action="http://www.youpak.com/search" id="searchmobile" style="display:none;" role="form" class="navbar-form navbar-search">
<span class="twitter-typeahead" style="position: relative; display: inline-block;">
<input id="searchInput" type="text" class="search-input form-control typeahead tt-query" placeholder="Search Videos / Youtube video link" name="q" value="">
<input type="hidden" value="type">
<button type="submit" class="btn navbar-search-btn"><i class="fa fa-search btn-bg-blue"></i></button>
</span>
</form>
</div>
<div class="row">
<div class="col-lg-12">
<a id="DownloadPanel" href="#" class="btn btn-danger btn-block">
<i class="fa fa-download"></i> Click here to <strong>Download this video</strong>
<span class="pull-right toggle">
<i class="fa margin-right-10 fa-chevron-down"></i>
</span>
</a>
</div>
<div id="downloadtoggle" class="col-lg-12 margin-bottom-5" data-visible="false" style="display: none;">
<div style="border: 1px solid #757575; padding: 5px;">
<p style="margin: 5px 0 5px 0;"><strong>To download video:</strong> Right click on the following button and select <strong>"Save Link As"</strong></p>
<div class="btn-group btn-group-justified">
<a href="
   
   https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?source=youtube&amp;sver=3&amp;ratebypass=yes&amp;ipbits=0&amp;lmt=1445456922621266&amp;upn=9x-KL1xuQok&amp;expire=1446395401&amp;itag=22&amp;mime=video/mp4&amp;dur=170.062&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;mm=31&amp;mn=sn-tt17dnee&amp;key=yt6&amp;ip=107.178.195.236&amp;mnta&amp;signature=4E644EA520AFB72901E0942260FC644FC7109C8A.87C08F7233C49823AEBEC1B0E48F1B046695B5E8&amp;title=Mar+Jaayen+-+Loveshhuda+%7C+Latest+Bollywood+Song+I+Girish+Kumar%2C+Navneet+Dhillon+%7C+Atif%2C+Mithoon&amp;extension=mp4" class="btn btn-primary btn-block p720">
720P HD (mp4)
</a><a href="https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?source=youtube&amp;sver=3&amp;ratebypass=yes&amp;ipbits=0&amp;lmt=1445456810686044&amp;upn=9x-KL1xuQok&amp;expire=1446395401&amp;itag=18&amp;mime=video/mp4&amp;dur=170.062&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;mm=31&amp;mn=sn-tt17dnee&amp;key=yt6&amp;ip=107.178.195.236&amp;mnta&amp;signature=27A935559BA3BF0BE36429A900F8591CBECA3115.68141969657D0A02F99B8DF5A1C6FDFC8DEA02EB&amp;title=Mar+Jaayen+-+Loveshhuda+%7C+Latest+Bollywood+Song+I+Girish+Kumar%2C+Navneet+Dhillon+%7C+Atif%2C+Mithoon&amp;extension=mp4" class="btn btn-warning btn-block">
360P (mp4)
</a><a href="https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,source,upn,expire&amp;source=youtube&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;dur=170.109&amp;sver=3&amp;expire=1446395401&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;ipbits=0&amp;mm=31&amp;key=yt6&amp;lmt=1445456805779644&amp;itag=36&amp;mime=video/3gpp&amp;ip=107.178.195.236&amp;upn=9x-KL1xuQok&amp;mn=sn-tt17dnee&amp;mnta&amp;signature=61B785A2EE2F409FCB8FEC370064698B3F56EFD3.56989B9D76F18B78EFF272F95BF4903DFBCE7266&amp;title=Mar+Jaayen+-+Loveshhuda+%7C+Latest+Bollywood+Song+I+Girish+Kumar%2C+Navneet+Dhillon+%7C+Atif%2C+Mithoon&amp;extension=3gp" class="btn btn-default btn-block">
240P Mobile (3gp)
</a> </div>
</div>
</div>
</div>
<div class="videoWrapper">
<video id="videoholder" controls autoplay preload="auto" onerror="failed(event)" class="video-js vjs-default-skin">
<source src="https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,source,upn,expire&amp;source=youtube&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;dur=170.031&amp;sver=3&amp;expire=1446395401&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;ipbits=0&amp;mm=31&amp;key=yt6&amp;lmt=1445456813389932&amp;itag=5&amp;mime=video/x-flv&amp;ip=107.178.195.236&amp;upn=9x-KL1xuQok&amp;mn=sn-tt17dnee&amp;mnta&amp;signature=6789F7E5C799FD5134E6693F6F93F5BE721C2783.C4B4C333821CCA58A06FC3B769C13835D112D033" type="video/x-flv" data-res="240p"/><source src="https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?source=youtube&amp;sver=3&amp;ratebypass=yes&amp;ipbits=0&amp;lmt=1445456810686044&amp;upn=9x-KL1xuQok&amp;expire=1446395401&amp;itag=18&amp;mime=video/mp4&amp;dur=170.062&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;mm=31&amp;mn=sn-tt17dnee&amp;key=yt6&amp;ip=107.178.195.236&amp;mnta&amp;signature=27A935559BA3BF0BE36429A900F8591CBECA3115.68141969657D0A02F99B8DF5A1C6FDFC8DEA02EB" type="video/mp4" data-res="360p"/><source src="https://r1---sn-tt17dnee.c.docs.google.com/videoplayback?source=youtube&amp;sver=3&amp;ratebypass=yes&amp;ipbits=0&amp;lmt=1445457665428170&amp;upn=9x-KL1xuQok&amp;expire=1446395401&amp;itag=43&amp;mime=video/webm&amp;dur=0.000&amp;fexp=9407117,9408710,9409206,9413123,9414764,9416126,9417367,9417707,9419788,9421166,9421665,9421911,9422596,9422910&amp;sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&amp;mt=1446373659&amp;pl=26&amp;mv=m&amp;id=o-AHp_rmyG_-tvTvDK-3AXhICSymyXe0R9GQvAKvMlfl5z&amp;ms=au&amp;mm=31&amp;mn=sn-tt17dnee&amp;key=yt6&amp;ip=107.178.195.236&amp;mnta&amp;signature=96FC298E273DB30B2B1863EA26E15AD601272FFE.9F7D000183B0815D9394F5992E998C280B2D6F70" type="video/webm" data-res="360p"/><source src="https://r4---sn-tt17rn7d.c.docs.google.com/videoplayback?ip=107.178.194.121&mv=m&sparams=dur,id,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&mt=1447089550&ms=au&mn=sn-tt17rn7d&mm=31&pl=27&id=o-AI2TOIo2Bq_2jk12JRTRZNQDvEU3C_jU867LOau3bZTc&lmt=1439358080619744&itag=43&source=youtube&upn=mXNclBEobBc&key=yt6&mime=video/webm&expire=1447111196&dur=0.000&ipbits=0&sver=3&fexp=9407002,9408710,9412777,9414764,9416126,9417683,9417707,9418204,9419444,9420453,9420481,9420540,9421353,9422596,9422618,9423431,9423488,9423519,9423645,9423662,9423792,9423992&ratebypass=yes&mnta&signature=2D9CA9264EF2676ABF7F29FD9ECE1CCE67522CAC.726B915A21582FE502CF250783F73E2C61D8CE62" type="video/mp4" data-res="720p"/> </video>
</div>
<div>
<div class="video-title">Mar Jaayen - Loveshhuda | Latest Bollywood Song I Girish Kumar, Navneet Dhillon | Atif, Mithoon</div>
<div class="row">
<div class="channelDetails col-sm-8">
<a href="channelbd30.html?id=UCJrDMFOdv1I2k8n9oK_V21w">
<img src="//yt3.googleusercontent.com/-somrUubvTcc/AAAAAAAAAAI/AAAAAAAAAAA/qkf3SJhH3MI/s240-c-k-no/photo.png" class="channelThumb" alt="Tips Music">
</a>
<a class="uploader-name" href="channelbd30.html?id=UCJrDMFOdv1I2k8n9oK_V21w">Tips Music</a>
<div style="margin-top:4px">
<div id="subscribeButton" class="btn btn-danger btn-xs pull-left" data-action="subscribe"><i class="fa fa-youtube-play"></i> Subscribe</div>
<div style="display: inline-block;"><div class="subscriberCount"><span class="subscripberNum">1,398,486</span></div><div class="subscriberCountNub"><s></s><i></i></div></div>
</div>
</div>
<div class="text-right col-sm-4">
<div class="font-size-16">
921,239 views </div>
<div class="progress">
<div style="width: 97.43800295615%;" class="progress-bar progress-bar-warning"></div>
</div>
<div class="font-size-13">
<span id="likeButton" data-action="like" data-toggle="tooltip" data-placement="top" title="" data-original-title="I like this"><span id="icon" style="font-size:20px"><i class="fa fa-thumbs-up "></i></span> 5,933</span>
<span id="disLikeButton" data-action="dislike" data-toggle="tooltip" data-placement="top" title="" data-original-title="I dislike this"><span id="icon" style="font-size:20px"><i class="fa fa-thumbs-down "></i></span> 156</span>
</div>
</div>
</div>
</div>
<div class="adBox adtray-728"><iframe src="http://albums.apnipie.com/728/Bradley-Cooper" scrolling="no" frameborder="0"></iframe></div><script>
     function adtray_728() {
    var pages = ["mobile-phones","Nintendo-Announces","Bradley-Cooper","Cameron-Diaz","Miami-Vice-memorabili"]; 
      var randompages = pages[Math.floor(Math.random() * pages.length)];
       $(".adtray-728").html('<iframe src="//albums.apnipie.com/728/'+randompages+'" scrolling="no" frameborder="0"></iframe>')
    }
     (function loop_728() {
        var miliseconds = ["90000", "120100", "150600", "210000", "185000", "220000", "250000", "230000", "240040", "60000", "80000", "110000", "130600", "270000", "300000", "320000", "330000", "360080", "388000", "404000", "458700", "590267"]; 
        var randomseconds = miliseconds[Math.floor(Math.random() * miliseconds.length)];
  
    setTimeout(function() {
            adtray_728();
            loop_728();  
    }, randomseconds);
    }());
     </script> <div>
<div id="content">
<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
<li class="active"><a href="#about-tab" data-toggle="tab"><i class="fa fa-bullhorn"></i><span class="about-tab-title">&nbsp;About</span></a></li>
<li><a href="#share-tab" data-toggle="tab"><i class="fa fa-link"></i><span class="share-tab-title">&nbsp;Share / Embed</span></a></li>
<li><a href="#report-tab" data-toggle="tab"><i class="fa fa-flag"></i><span class="report-tab-title">&nbsp;Report<span></a></li>
</ul>
<div id="my-tab-content" class="tab-content">
<div class="tab-pane fade active in" id="about-tab">
<h4 class="font-weight-bold"><i class="fa fa-clock-o"></i>&nbsp;Published On Oct 16, 2015</h4>
<div style="font-size: 16px;font-weight: bold;">Category: <a class="title-color" href="categoryf41b.html?id=10">Music</a></div>
<div id="about" class="overflow-hidden" style="background-image:linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)"><p>Watch the latest Bollywood song of 2015 'Mar Jaayen' from the movie 'Loveshhuda' staring Girish Kumar & Navneet Dhillon. The magical combination of Atif Aslam, Mithoon & Sayeed Quadri make Mar Jaayen a heart touching gem to sing along with. Press play & listen<br/><br/>In Cinemas 15th Jan 2016.<br/><br/>Stay updated with movie 'Loveshhuda' videos, Subscribe on below link.<br/>http://bit.ly/1HIwwbU<br/><br/>Song Credits:<br/>Singer: Atif Aslam<br/>Music Composed, Arranged & Programmed by Mithoon<br/>Lyrics Writer: Sayeed Quadri<br/>Drum Programming by Bobby Shrivastava<br/>Recording Engineer A Manivannan<br/>Song Mixed & Mastered by Eric Pillai (Future Sound Of Bombay)<br/><br/>Movie Cast & Credits:<br/>Cast: Girish Kumar, Navneet Dhillon<br/>Movie Directed by Vaibhav Misra<br/>Produced by Vijay Galani<br/>Director of Photography: Bijitesh De<br/>Story, Screenplay: Vaibhav Misra <br/>Choreographer: Bosco Ceaser, Kushal Digankar<br/>Dialogues: Hussian Dalal<br/>Editor: Utsav Bhagat<br/>Costume Designer: Shyamli Arora<br/>Production Designer: Shree Kumar Nair, Priyanka Grover<br/><br/>Set 'Mar Jaayen' song as your Mobile Callertune (India Only)<br/>Vodafone Users Dial 5376716355<br/>Airtel Users Dial 5432115049411<br/>Idea Users Dial 567896716355<br/><br/>Hear the full song first on Saavn, Click below link <br/>http://saa.vn/loveshhuda<br/><br/>Song Lyrics:<br/>Har Lamha Dekhne Ko<br/>Tujhe Intezaar Karna<br/>Tujhe Yaad Karke Aksar<br/>Raaton Main Roz Jagna<br/>Badla Hua Hai Kuch Toh<br/>Dil In Dino Yeh Apna<br/><br/>Kaash Woh Pal Paida Hi Naa Ho<br/>Jis Pal Mein Nazar Tu Naa Aaye<br/>Kaash Woh Pal Paida Hi Naa Ho<br/>Jis Pal Main Nazar Tu Naa Aaye<br/>Gar Kahin Aisa Pal Ho<br/>Toh Iss Pal Mein Mar Jaayen<br/>Mar Jaayen Mar Jaayen<br/>Mar Jaayen Ho Mar Jaayen<br/>Mar Jaayen Mar Jaayen<br/>Mar Jaayen Ho Mar Jaayen<br/><br/>Tuhjse Juda Hone Ka Tasavur<br/>Ek Gunaah Sa Lagta Hai<br/>Jab Aata Hai Bheed Mein Aksar<br/>Mujhko Tanha Karta Hai<br/>Khwab Mein Bhi Jo Dekhle Yeh<br/>Raat Ki Neendein Udd Jaayen<br/>Mar Jaayen Mar Jaayen<br/>Mar Jaayen Ho Mar Jaayen<br/>Mar Jaayen Mar Jaayen<br/>Mar Jaayen Ho Mar Jaayen<br/><br/>Join Us On<br/>http://youtube.com/tipsmusic<br/>http://dailymotion.com/tipsmusicfilms<br/>http://facebook.com/tipsfilms<br/>http://twitter.com/tipsfilms<br/>https://plus.google.com/+TipsMusic<br/>http://instagram.com/tipsfilms<br/><br/>https://www.youtube.com/watch?v=i8dPrAHqVFc</p></div>
<div class="show-more closed">show more<span class="caret"></span></div>
</div>
<div class="tab-pane fade" id="share-tab">
<h4 class="font-weight-bold">Share/Embed</h4>
<div class="mbl">
<button class="btn btn-facebook" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=http://www.youpak.com/watch?v=i8dPrAHqVFc','','fullscreen')"><i class="fa fa-facebook"></i><span class="share-btn-title"> Facebook</span></button>
<button class="btn mlxs btn-twitter" onclick="window.open('http://twitter.com/intent/tweet?url=http://www.youpak.com/watch?v=i8dPrAHqVFc&amp;text=&amp;hashtags=youpakcom','','fullscreen')"><i class="fa fa-twitter"></i><span class="share-btn-title"><span class="share-btn-title"> Twitter</span></button>
<button class="btn mlxs btn-pinterest" onclick="window.open('http://pinterest.com/pin/create/button/?url=http://www.youpak.com/watch?v=i8dPrAHqVFc&amp;media=https://i.ytimg.com/vi/i8dPrAHqVFc/0.jpg&amp;description=Mar%20Jaayen%20-%20Loveshhuda%20|%20Latest%20Bollywood%20Song%20I%20Girish%20Kumar,%20Navneet%20Dhillon%20|%20Atif,%20Mithoon','','fullscreen')"><i class="fa fa-pinterest"></i><span class="share-btn-title"> Pinterest</span></button>
<button class="btn mlxs btn-linkedin" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.youpak.com/watch?v=i8dPrAHqVFc&amp;title=Mar%20Jaayen%20-%20Loveshhuda%20|%20Latest%20Bollywood%20Song%20I%20Girish%20Kumar,%20Navneet%20Dhillon%20|%20Atif,%20Mithoon&amp;summary=Mar%20Jaayen%20-%20Loveshhuda%20|%20Latest%20Bollywood%20Song%20I%20Girish%20Kumar,%20Navneet%20Dhillon%20|%20Atif,%20Mithoon&amp;source=youpak','','fullscreen')"><i class="fa fa-linkedin"></i><span class="share-btn-title"> LinkedIn</span></button>
<button class="btn mlxs btn-google-plus" onclick="window.open('http://plus.google.com/share?url=http://www.youpak.com/watch?v=i8dPrAHqVFc','','fullscreen')"><i class="fa fa-google-plus"></i><span class="share-btn-title"> Google Plus</span></button>
</div>
<div class="video-content">
<div class="row input-group social-btns">
<div class="tab-pane fade active in width-full">
<div class="clearfix"></div>
<h4 class="font-weight-bold">Video Link</h4>
<div class="input-group col-md-8 width-full">
<span class="input-group-addon"><i class="fa fa-link"></i></span>
<input type="text" id="shareable_link" value="http://www.youpak.com/watch?v=i8dPrAHqVFc" class="form-control" onclick="$(this).select()">
</div>
<h4 class="font-weight-bold">Embed Video</h4>
<div class="video-embed relative clearfix">
<div class="input-group mbm col-md-12">
<span class="input-group-addon">
<i class="fa fa-expand"></i>
</span>
<textarea name="embed_code" id="embed_code" onclick="this.select()" class="form-control height">&lt;iframe width="600" height="350" src="http://www.youpak.com/embed?v=i8dPrAHqVFc" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</textarea>
</div>
</div>
<br>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="report-tab">
<h4 class="font-weight-bold">Report</h4>
<p>Please select the category that most closely reflects your concern about the video, so that we can review it and determine whether it violates our Community Guidelines or isn't appropriate for all viewers. Abusing this feature is also a violation of the Community Guidelines, so don't do it.</p>
<div id="formbody">
<div id="reportform"> <div class="input-group col-md-8"> <select name="subject" id="subject" class="form-control" style="height: 34px;">
<option value="Broken Link ">Broken Link</option>
<option value="Anti Religious ">Anti Religious</option>
<option value="Copyright Infringement">Copyright Infringement</option>
<option value="Hatred Speech ">Hatred Speech</option>
<option value="Violence">Violence</option>
<option value="Sexually Explicit Content">Sexually Explicit Content</option>
</select> <div class="input-group-btn"> <div id="submit_report" class="btn btn-primary">Submit Report</div> </div> </div></div></div>
</div>
</div>
</div>
</div>
<script>
	$(document).ready(function(){			  			   
        $('#commentTextGuest, #likeButton, #disLikeButton, #subscribeButton').click(function(){
			 $('#loginbox').modal({remote: 'account',show: true});
		});
	});
</script>
<div id="comments" class="comments">
<div class="commentstoptoggle" style="display:none;">
<div class="total-comments" style="display:none;">
<i class="fa fa-comments"></i>&nbsp;&nbsp;535 Comments</div>
<div id="commentsOrderButton" class="btn-group" style="display:none;">
<a data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" href="#" aria-expanded="false"><span id="commentsOrder">Top Comments</span> <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a class="commentsOrderTop" data-order="top" href="#">Top comments </a></li>
<li><a class="commentsOrderNew" data-order="published" href="#">Newest first</a></li>
</ul>
</div>
</div>
<form id="commentForm" style="display:none;">
<div class="row" style="min-height: 80px;">
<div class="commenttable">
<div class="imageholder">
<img class="img-rounded" src="images/no-photo-60.jpg">
</div>
<div id="commentContainer" class="col-lg-12 text-right">
<textarea id="commentTextGuest" rows="1" class="form-control" placeholder="Share your thoughts, add a comment" style="cursor: pointer; resize:none; height: 60px;"></textarea>
</div>
</div>
</div>
</form>
<div id="ytcomments"></div>
<div style="display:none;" class="more-comments" data-nexttoken>show more comments</div>
<div id="comments-msg" align="center"><i class="fa fa-spinner fa-spin"></i> Loading...</div>
</div>
<div class="adBox adtray-7281"><iframe src="http://albums.apnipie.com/7281/don-lawn" scrolling="no" frameborder="0"></iframe></div><script>
     function adtray_7281() {
    var pages = ["actor-Bill","AVG-To-Buy-Family-Focused-Mobile-Security","don-lawn","Shades-draws","Wenger-wary"]; 
      var randompages = pages[Math.floor(Math.random() * pages.length)];
       $(".adtray-7281").html('<iframe src="//albums.apnipie.com/7281/'+randompages+'" scrolling="no" frameborder="0"></iframe>')
    }
     (function loop_7281() {
        var miliseconds = ["90000", "120100", "150600", "210000", "185000", "220000", "250000", "230000", "240040", "60000", "80000", "110000", "130600", "270000", "300000", "320000", "330000", "360080", "388000", "404000", "458700", "590267"]; 
        var randomseconds = miliseconds[Math.floor(Math.random() * miliseconds.length)];
  
    setTimeout(function() {
            adtray_7281();
            loop_7281();  
    }, randomseconds);
    }());
     </script></div>
<div class="col-md-4">
<div class="adBox adtray-250"><iframe src="http://article.axtender.com/250/Mesothelioma-Law-Firm" scrolling="no" frameborder="0"></iframe></div> <div class="related-videos-style">Related Videos</div>
<div class="message">Loading...</div>
<div id="sidebar">
</div>
<a class="loadrelated" style="display:none;text-decoration: none;" data-next>Show More</a>
</div>


@stop


