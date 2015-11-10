@extends('front.template')

@section('main')
<script>
    $(document).ready(function(){
       $( "#loadvideos" ).click(function(){
                  loadvideos($('#loadvideos').data('next'));
       });
    });
     function loadvideos(next){
                    $('#loadvideos').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                      $('#loadvideos').addClass('disabled');
                     $.ajax({
                        type: "GET", 
                                      url: "process/getvideos",
                        data: { type: 'channel',id:'UCwTgOPHFN_K5vRDZFxvAPPQ',order:'date',token:next},
                        dataType: "json",
                        success: function(response){
                        $('#results').append(response.html);  
                        if(response.nexttoken){
                          $('#loadvideos').html('Load more').removeClass('disabled').show().data('next', response.nexttoken);
                        }else{
                          $('#loadvideos').html('End of Videos');
                        }
                      },   
                      error: function(XMLHttpRequest,textStatus,errorThrown) {
                        setTimeout(function(){
                         loadvideos(next);
                        },5000);    
                     }
                    });
                  }; 
                  $(window).scroll(function(){
                    if  ( $(window).scrollTop() == $(document).height() - $(window).height() && !$( "#loadvideos" ).hasClass( "disabled" ) ){
                        $('#loadvideos').click();   
                    }
                  }); 
                          $(document).ready(function(){                
                      $('#subscribeButton').click(function(){
                     $('#loginbox').modal({remote: 'account',show: true});
                  });
                });
                </script>

                
                
<div class="page-header">
<div class="clearfix feed-header" data-role="banner">
<div class="compInnerWrapper" style="background-image:url(../yt3.googleusercontent.com/-xIG2LplNnfM/UsEaL0VdyhI/AAAAAAAAAOI/irUmZ1Qy_Sk/w1707-fcrop64%3d1%2c00005a57ffffa5a8-nd/channels4_banner.jpg);"></div>
</div>
<div class="profile-user">
<div class="row">
<div class="col-lg-6 col-md-6n col-sm-6 col-xs-6">
<img src="../yt3.googleusercontent.com/-w1VZv-xnB1w/AAAAAAAAAAI/AAAAAAAAAAA/V3gr6sUl6_Y/s240-c-k-no/photo.jpg" class="img-polaroid">
<h2>Sikh Roots</h2>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="channelsubscribe">
<div style="display:inline-block;">
<div id="subscribeButton" class="btn btn-danger btn-xs pull-left" data-action="subscribe"><i class="fa fa-youtube-play"></i> Subscribe</div>
<div style="display: inline-block;"><div class="subscriberCount"><span class="subscripberNum">2,300</span></div><div class="subscriberCountNub"><s></s><i></i></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-8 row-border">
<div class="adBox adtray-728"><iframe src="http://albums.apnipie.com/728/mobile-phones" scrolling="no" frameborder="0"></iframe></div><script>
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
     </script> 
     
   <div id="results">
                <div class='col-xs-12 videopost'>
                <a class='title-color' href='watch.html' title='Fonseca Backstage at the 2015 Latin AMAs'>
                    <div class='video-thumbs'>	
                        <img class='videosthumbs-style' src='https://ytimg.googleusercontent.com/vi/2Y9cS19tSU0/mqdefault.jpg'>
                        <div class='duration-toggle'>
                            <span class='duration'>02:55</span>
                        </div>
                    </div>
                    <div class='title-style'>Fonseca Backstage at the 2015 Latin AMAs</div>
                </a>
                <div class='viewsanduser'>
                    <span style='font-weight:bold;'>by <a class='by-user' href='channel.html'>Billboard</a><br/>Posted 3 weeks ago &lowast; Views: 405</span>
                </div>
                <div class='postdiscription'>Fonseca Backstage at the 2015 Latin AMAs</div>
            </div>
                <div class='col-xs-12 videopost'>
                <a class='title-color' href='watch.html' title='Fonseca Backstage at the 2015 Latin AMAs'>
                    <div class='video-thumbs'>	
                        <img class='videosthumbs-style' src='https://ytimg.googleusercontent.com/vi/2Y9cS19tSU0/mqdefault.jpg'>
                        <div class='duration-toggle'>
                            <span class='duration'>02:53</span>
                        </div>
                    </div>
                    <div class='title-style'>Fonseca Backstage at the 2015 Latin AMAs</div>
                </a>
                <div class='viewsanduser'>
                    <span style='font-weight:bold;'>by <a class='by-user' href='channel.html'>Billboard</a><br/>Posted 3 weeks ago &lowast; Views: 405</span>
                </div>
                <div class='postdiscription'>Fonseca Backstage at the 2015 Latin AMAs</div>
            </div>
                <div class='col-xs-12 videopost'>
                <a class='title-color' href='watch.html' title='Fonseca Backstage at the 2015 Latin AMAs'>
                    <div class='video-thumbs'>	
                        <img class='videosthumbs-style' src='https://ytimg.googleusercontent.com/vi/2Y9cS19tSU0/mqdefault.jpg'>
                        <div class='duration-toggle'>
                            <span class='duration'>02:55</span>
                        </div>
                    </div>
                    <div class='title-style'>Fonseca Backstage at the 2015 Latin AMAs</div>
                </a>
                <div class='viewsanduser'>
                    <span style='font-weight:bold;'>by <a class='by-user' href='channel.html'>Billboard</a><br/>Posted 3 weeks ago &lowast; Views: 405</span>
                </div>
                <div class='postdiscription'>Fonseca Backstage at the 2015 Latin AMAs</div>
            </div>
                <div class='col-xs-12 videopost'>
                <a class='title-color' href='watch.html' title='Fonseca Backstage at the 2015 Latin AMAs'>
                    <div class='video-thumbs'>	
                        <img class='videosthumbs-style' src='https://ytimg.googleusercontent.com/vi/2Y9cS19tSU0/mqdefault.jpg'>
                        <div class='duration-toggle'>
                            <span class='duration'>02:55</span>
                        </div>
                    </div>
                    <div class='title-style'>Fonseca Backstage at the 2015 Latin AMAs</div>
                </a>
                <div class='viewsanduser'>
                    <span style='font-weight:bold;'>by <a class='by-user' href='channel.html'>Billboard</a><br/>Posted 3 weeks ago &lowast; Views: 405</span>
                </div>
                <div class='postdiscription'>Fonseca Backstage at the 2015 Latin AMAs</div>
            </div>


        </div>
     
     
     
<div id="loadvideos" class="btn btn-default" data-next="CA8QAA">Load More</div> <div class="adBox adtray-7281"><iframe src="http://albums.apnipie.com/7281/actor-Bill" scrolling="no" frameborder="0"></iframe></div><script>
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
     </script> </div>
<div class="col-md-4">
<div class="adBox adtray-600"><iframe src="http://albums.apnipie.com/600/Barcelona-transfer-ban" scrolling="no" frameborder="0"></iframe></div> </div>
</div>
</div>


@stop


