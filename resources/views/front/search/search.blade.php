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




<div class="col-md-8 row-border">
    <div class="adBox adtray-728">


        <!-- Add code -->

    </div>
    
        <div class="page-heading-nav">
            
        <div class="pagehead">
            @include('front.partials.msearch')
            <div class="page-heading">Search Results</div>
            <div class="btn-group pull-left margin-top-10 margin-bottom-5">
                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                    Sort Videos <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="category.html?id=10&amp;order=date">Date</a></li>
                    <li><a href="category.html?id=10&amp;order=rating">Rating</a></li>
                    <li><a href="category.html?id=10&amp;order=relevance">Relevance</a></li>
                    <li><a href="category.html?id=10&amp;order=title">Title</a></li>
                    <li><a href="category.html?id=10&amp;order=viewCount">Views</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div id="results">
             @foreach($results as $result)
       
       
            <div class='col-xs-12 videopost'>
                <a class='title-color' href="{!!route('watch.index')!!}?v={!!$result->id->videoId!!}" title='{!!$result->snippet->title!!}'>
                    <div class='video-thumbs'>	
                        <img class='videosthumbs-style' src='{!!$result->snippet->thumbnails->default->url!!}'>
                        <div class='duration-toggle'>
                            <span class='duration'>02:55</span>
                        </div>
                    </div>
                    <div class='title-style'>{!!$result->snippet->title!!}</div>
                </a>
                <div class='viewsanduser'>
                    <span style='font-weight:bold;'>by <a class='by-user' href="{!!route('channel.index')!!}?id={!!$result->snippet->channelId!!}">{!!$result->snippet->channelTitle!!}</a><br/>  Views: 405 <br> Published At: {!!$result->snippet->publishedAt!!}</span>
                </div>
                <div class='postdiscription'>{!!$result->snippet->description!!}</div>
            </div>
                
              @endforeach


        </div>

                      <div id="loadvideos" class="btn btn-default" data-next="CA8QAA">Load More</div>        
                      <div class="adBox adtray-7281"><iframe src="http://albums.apnipie.com/7281/AVG-To-Buy-Family-Focused-Mobile-Security" scrolling="no" frameborder="0"></iframe></div><script>
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
             </script>          </div>
                  <div class="col-md-4">
                  <div class="adBox adtray-600"><iframe src="http://albums.apnipie.com/600/Barcelona-transfer-ban" scrolling="no" frameborder="0"></iframe></div><script>
             function adtray_600() {
            var pages = "Barcelona-transfer-ban"; 
              var randompages = pages[Math.floor(Math.random() * pages.length)];
               $(".adtray-600").html('<iframe src="//albums.apnipie.com/600/'+randompages+'" scrolling="no" frameborder="0"></iframe>')
            }
             (function loop_600() {
                var miliseconds = ["90000", "120100", "150600", "210000", "185000", "220000", "250000", "230000", "240040", "60000", "80000", "110000", "130600", "270000", "300000", "320000", "330000", "360080", "388000", "404000", "458700", "590267"]; 
                var randomseconds = miliseconds[Math.floor(Math.random() * miliseconds.length)];

            setTimeout(function() {
                    adtray_600();
                    loop_600();  
            }, randomseconds);
            }());
             </script>       <div class="like-box-hide">  
                  <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = '../connect.facebook.net/en_US/sdk.js#xfbml=1&appId=334186876754714&version=v2.0';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class='fb-page' data-href='https://www.facebook.com/youpakistan' data-hide-cover='false' data-show-facepile='true' data-show-posts='false'><div class='fb-xfbml-parse-ignore'></div></div> 
                  </div>
                  </div>
             </div>
           </div>



@stop


