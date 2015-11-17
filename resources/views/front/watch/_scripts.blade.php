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
        var videoid='dHPxkZ7S_H8';
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

 var videoid='dHPxkZ7S_H8';
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
	

 var videoid='dHPxkZ7S_H8';
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