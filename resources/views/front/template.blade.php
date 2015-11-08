 <!doctype html>
<html>

<head>
<title>ytpass.com</title>
<meta name="title" content="YouPak -  Planet Of Entertainment">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="Watch or Download Youtube videos without any Proxy or VPN even if youtube is blocked in your country.">
<meta name="keywords" content="youpak.com, youpak, pakistani videos, browse videos, browse youtube videos, watch youtube video, unblock youtube videos, download youtube videos, watch youtube videos without proxy or vpn">
<link rel="shortcut icon" href="assets/images/favicon.ico"/>
<link rel="stylesheet" href="assets/styles/bootstrap.mind5f7.css?ver=2.0"/>
<link rel="stylesheet" href="assets/styles/stylesb95e.css?ver=2.0.3"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pace/0.4.17/pace.min95fa.js?v=0.4.17"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--><script type="text/javascript">
   $(document).ready(function() {
        var anExcitedSource = function(query, cb) {
            $.getJSON("http://suggestqueries.google.com/complete/search?callback=?",
                    { 'hl':'en', 'jsonp':'suggestCallBack', 'q':query, 'client':'youtube', 'ds':'yt', 'gl':'us' } );
                 suggestCallBack = function (data) {
                    var suggestions = [];
                    $.each(data[1], function(key, val) {
                        suggestions.push({"value":val[0]});
                    });
                    suggestions.length = 6;                     cb(suggestions);
                }; };
          $('#searchInput, #searchInputmobile').typeahead({
                autoselect: false,
                highlight: true,
                minLength: 2,
                hint: false
            }, {
                source: anExcitedSource
                  }).on('typeahead:selected', function(e){
                e.target.form.submit();
              });
            
                         if($(window).width() <= 620){
                $(".adtray-728, .adtray-7281").remove();
              }
              
               if($(window).width() <= 318){
                $(".adtray-250, .adtray-600").remove();
              }
    });
  </script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
<div class="container">
<div class="navbar-header">
<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="index.html" class="navbar-brand logo"><img src="assets/images/logo4e44.png?ver=1.3" height="25"/></a>
</div>
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
<div class="col-lg-6 col-md-6 col-sm-6">
<form action="search.html" id="search" role="form" class="navbar-form navbar-left navbar-search">
<span class="twitter-typeahead" style="position: relative; display: inline-block;">
<input id="searchInput" type="text" class="search-input form-control typeahead tt-query" placeholder="Search Videos / Youtube video link" name="q" value="">
<input type="hidden" value="type">
<button type="submit" class="btn navbar-search-btn"><i class="fa fa-search btn-bg-blue"></i></button>
</span>
</form>
</div>
<ul class="nav navbar-nav navbar-right">
<li><a id="upload-btn" href="#" data-remote="account" data-target="#loginbox" data-toggle="modal"><div class="upload-toggle"><div>Upload</div></div></a></li>
<li><a id="login-btn" href="#" data-remote="account" data-target="#loginbox" data-toggle="modal"><div class="login-toggle"><i class="fa fa-google-plus g-icon-handle"></i><div>Sign in</div></div></a></li>
</ul>
</nav>
</div>
</div>
<div id="loginbox" class="modal fade" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="row">
<div class="col-md-12 col-xs-12">
<div class="modal-body text-center">
<p><i class="fa fa-spinner fa-spin text-danger"></i> <strong class="text-danger">Loading.......</strong></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container white-bg">
<div class="row">
<script>
$(document).ready(function(){
    loadhomevideo('#islam','homechannel','UCJ37YA_iAzyMwWekDZmgE1g');
    loadhomevideo('#technology','homechannel','UCCjyq_K1Xwfg8Lndy7lKMpA');
    loadhomevideo('#Sports','homecategory','17');
             });
  function loadhomevideo(videogroup,type,Id){
    getdata = JSON.parse(localStorage.getItem('data-'+videogroup));
        if( localStorage && getdata && (getdata.time > new Date().getTime())) {
            $(videogroup).html(getdata.html);
         }else{
            $.ajax({
              url: 'process/getvideos.php',
              data: {type:type, id: Id},
              dataType: "json",
                success: function(response){
                    $(videogroup).html(response.html);
                    var date = new Date();
                    cache_time = date.getTime() + (2*60*60*1000);
                    if(localStorage && response.html){
                      var data = {time: cache_time,html: response.html};
                    localStorage.setItem('data-'+videogroup,JSON.stringify(data));
                   }
                  },   
                  error: function(XMLHttpRequest,textStatus,errorThrown) {
                        setTimeout(function(){
                         loadhomevideo(videogroup,type,Id);
                        },5000);    
                    }
                 }); 
            }
         };

           function setCookie(cname,cvalue,exdays) {
              var d = new Date();
              d.setTime(d.getTime() + (exdays*24*60*60*1000));
              var expires = "expires=" + d.toGMTString();
              document.cookie = cname+"="+cvalue+"; "+expires;
          }
          function hideVideos(id){
            setCookie(id, 'true', 365);
              $('#'+id+'>.media').slideUp();
              $('#'+id+'>#unhide').slideDown();
              $('#'+id+'>.page-header>h4>.hide-videos>li>ul>li').html('<a class="unhide" onclick="unhide(\''+id+'\')">Unhide these videos</a>');
          }
          function unhide(id){
              setCookie(id, 'false', 365);
              $('#'+id+'>.media').slideDown();
              $('#'+id+'>#unhide').slideUp();
              $('#'+id+'>.page-header>h4>.hide-videos>li>ul>li').html('<a class="pointer" onclick="hideVideos(\''+id+'\')">Hide these videos</a>');
          }
</script>
<div class="col-md-8 row-border">
<div class="adBox adtray-728"><iframe src="http://albums.apnipie.com/728/Cameron-Diaz" scrolling="no" frameborder="0"></iframe></div><script>
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
     </script> <div class="page-header pagehed">
<form action="search.html" id="searchmobile" style="display:none;" role="form" class="navbar-form navbar-search">
<span class="twitter-typeahead" style="position: relative; display: inline-block;">
<span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input id="searchInputmobile" type="text" class="search-input form-control typeahead tt-query tt-input" placeholder="Search Videos / Youtube video link" name="q" value="" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: absolute; top: 100%; z-index: 100; display: none; left: 0px; right: auto;"><div class="tt-dataset-0"></div></span></span>
<input type="hidden" value="type">
<button type="submit" class="btn navbar-search-btn"><i class="fa fa-search btn-bg-blue"></i></button>
</span>
</form>
<h4><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Promoted</h4>
</div>
<div class="promoted-row">
<div class="row">
<div id="promoted" class="col-xs-12 col-sm-6 promoted-big">
<a title="Tung Tung Baje - Singh Is Bliing | Akshay Kumar & Amy Jackson | Diljit Dosanjh & Sneha Khanwalkar" href="watch.html">
<img class="promob-thumbstyle" src="http://ytimg.googleusercontent.com/vi/dHPxkZ7S_H8/0.jpg">
</a>
<p class="duration-toggle">
<span class="duration">02:09</span></p>
<a class="title-color" title="Tung Tung Baje - Singh Is Bliing | Akshay Kumar & Amy Jackson | Diljit Dosanjh & Sneha Khanwalkar" href="watch.html">
<div class="caption">
<div class="title-style">Tung Tung Baje - Singh Is Bliing | Akshay Kum..</div>
</a>
<div class="viewsanduser">Posted 3 months ago &lowast; Views: 7,869,324</div>
</div>
</div><div id="promoted" class="col-xs-12 col-sm-6 promoted">
<a class="title-color" title="Mar Jaayen - Loveshhuda | Latest Bollywood Song I Girish Kumar, Navneet Dhillon | Atif, Mithoon" href="watch.html">
<div class="promo-thumbs">
<img class="promothumbs-style" src="http://ytimg.googleusercontent.com/vi/i8dPrAHqVFc/mqdefault.jpg">
<p class="duration-toggle">
<span class="duration">02:51</span></p>
</div>
<div class="caption">
<div class="title-style">Mar Jaayen - Loveshhuda | Latest Bo..</div>
</a>
<div class="viewsanduser">Posted 2 weeks ago <br/> Views: 921,239</div>
</div>
</div><div id="promoted" class="col-xs-12 col-sm-6 promoted">
<a class="title-color" title="Jalte Diye Song | Prem Ratan Dhan Payo | Salman Khan & Sonam Kapoor | Diwali 2015" href="watch.html">
<div class="promo-thumbs">
<img class="promothumbs-style" src="http://ytimg.googleusercontent.com/vi/_fcQ869Waeg/mqdefault.jpg">
<p class="duration-toggle">
<span class="duration">02:13</span></p>
</div>
<div class="caption">
<div class="title-style">Jalte Diye Song | Prem Ratan Dhan P..</div>
</a>
<div class="viewsanduser">Posted 2 weeks ago <br/> Views: 427,154</div>
</div>
</div><div id="promoted" class="col-xs-12 col-sm-6 promoted">
<a class="title-color" title="Dheere Dheere Se Meri Zindagi Video Song (OFFICIAL) Hrithik Roshan, Sonam Kapoor | Yo Yo Honey Singh" href="watch.html">
<div class="promo-thumbs">
<img class="promothumbs-style" src="http://ytimg.googleusercontent.com/vi/nCD2hj6zJEc/mqdefault.jpg">
<p class="duration-toggle">
<span class="duration">05:04</span></p>
</div>
<div class="caption">
<div class="title-style">Dheere Dheere Se Meri Zindagi Video..</div>
</a>
<div class="viewsanduser">Posted 2 months ago <br/> Views: 68,820,265</div>
</div>
</div> </div>
</div>
<div id="div-islam">
<div class="page-header">
<h4>
<span class="icons thirty2 islam"></span>&nbsp;&nbsp;Islam
<ul class="nav nav-pills pull-right hide-videos">
<li class="dropdown pull-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v color-a"></i></a>
<ul class="dropdown-menu" role="menu"><li><a class="pointer" onclick="hideVideos('div-islam')">Hide these videos</a></li></ul>
</li>
</ul> </h4>
</div>
<ul id="islam" class="media">
<li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li> </ul>
<div id="unhide" align="center" style="display:none"><a class="unhide" onclick="unhide('div-islam')">Click here to Unhide this section</a></div>
</div>
<div id="div-tech">
<div class="page-header">
<h4>
<i class="fa fa-laptop"></i>&nbsp;&nbsp;Technology
<ul class="nav nav-pills pull-right hide-videos">
<li class="dropdown pull-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v color-a"></i></a>
<ul class="dropdown-menu" role="menu"><li><a class="pointer" onclick="hideVideos('div-tech')">Hide these videos</a></li></ul>
</li>
</ul> </h4>
</div>
<ul id="technology" class="media">
<li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li> </ul>
<div id="unhide" align="center" style="display:none"><a class="unhide" onclick="unhide('div-tech')">Click here to Unhide this section</a></div>
</div>
<div id="div-sports">
<div class="page-header">
<h4>
<i class="fa fa-trophy"></i>&nbsp;&nbsp;Sports
<ul class="nav nav-pills pull-right hide-videos">
<li class="dropdown pull-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v color-a"></i></a>
<ul class="dropdown-menu" role="menu"><li><a class="pointer" onclick="hideVideos('div-sports')">Hide these videos</a></li></ul>
</li>
</ul> </h4>
</div>
<ul id="Sports" class="media">
<li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li><li class="video media-loading">
<div class="mediathumb">
<div class="load-tmb"><div>loading...</div></div>
</div>
<h5>▄▄▄▄▄▄▄▄▄▄▄▄▄▄</h5>
<div class="tmb-tog">▄▄▄▄▄▄▄▄▄▄▄▄▄<br>▄▄▄▄▄▄</div>
</li> </ul>
<div id="unhide" align="center" style="display:none"><a class="unhide" onclick="unhide('div-sports')">Click here to Unhide this section</a></div>
</div>
<div id="div-most-viewed">
<div class="page-header">
<h4>
<i class="fa fa-globe"></i>&nbsp;&nbsp;Most Viewed
<ul class="nav nav-pills pull-right hide-videos">
<li class="dropdown pull-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v color-a"></i></a>
<ul class="dropdown-menu" role="menu"><li><a class="pointer" onclick="hideVideos('div-most-viewed')">Hide these videos</a></li></ul>
</li>
</ul> </h4>
</div>
<ul id="most-viewed" class="media">
<li class="homethumb">
<div class="mediathumb">
<a title="Adele - Hello" href="watch.html?v=YQHsXMglC9A">
<img src="http://ytimg.googleusercontent.com/vi/YQHsXMglC9A/mqdefault.jpg" alt="Adele - Hello">
<span class="duration">06:07</span>
</a>
</div>
<h4><a title="Adele - Hello" href="watch.html?v=YQHsXMglC9A" class="medialink">Adele - Hello</a></h4>
<div class="viewsanduser">Posted 1 week ago <br/>Views: 179,135,948</div>
</li><li class="homethumb">
<div class="mediathumb">
<a title="Jabba the Hutt (PewDiePie Song) by Schmoyoho" href="watch.html?v=lxw3C5HJ2XU">
<img src="http://ytimg.googleusercontent.com/vi/lxw3C5HJ2XU/mqdefault.jpg" alt="Jabba the Hutt (PewDiePie Song) by Schmoyoho">
<span class="duration">02:12</span>
</a>
</div>
<h4><a title="Jabba the Hutt (PewDiePie Song) by Schmoyoho" href="watch.html?v=lxw3C5HJ2XU" class="medialink">Jabba the Hutt (PewDiePie Song) by Sc..</a></h4>
<div class="viewsanduser">Posted 2 years ago <br/>Views: 36,939,552</div>
</li><li class="homethumb">
<div class="mediathumb">
<a title="Safe & Sound feat. The Civil Wars (The Hunger Games: Songs From District 12 And Beyond)" href="watch.html?v=RzhAS_GnJIc">
<img src="http://ytimg.googleusercontent.com/vi/RzhAS_GnJIc/mqdefault.jpg" alt="Safe & Sound feat. The Civil Wars (The Hunger Games: Songs From District 12 And Beyond)">
<span class="duration">04:01</span>
</a>
</div>
<h4><a title="Safe & Sound feat. The Civil Wars (The Hunger Games: Songs From District 12 And Beyond)" href="watch.html?v=RzhAS_GnJIc" class="medialink">Safe & Sound feat. The Civil Wars (Th..</a></h4>
<div class="viewsanduser">Posted 4 years ago <br/>Views: 79,714,292</div>
</li><li class="homethumb">
<div class="mediathumb">
<a title="Taylor Swift - Everything Has Changed ft. Ed Sheeran" href="watch.html?v=w1oM3kQpXRo">
<img src="http://ytimg.googleusercontent.com/vi/w1oM3kQpXRo/mqdefault.jpg" alt="Taylor Swift - Everything Has Changed ft. Ed Sheeran">
<span class="duration">04:13</span>
</a>
</div>
<h4><a title="Taylor Swift - Everything Has Changed ft. Ed Sheeran" href="watch.html?v=w1oM3kQpXRo" class="medialink">Taylor Swift - Everything Has Changed..</a></h4>
<div class="viewsanduser">Posted 2 years ago <br/>Views: 156,682,734</div>
</li>
</ul>
<div id="unhide" align="center" style="margin-bottom:25px;display:none;"><a class="unhide" onclick="unhide('div-most-viewed')">Click here to Unhide this section</a></div>
</div>
<div class="adBox adtray-7281"><iframe src="http://albums.apnipie.com/7281/Shades-draws" scrolling="no" frameborder="0"></iframe></div><script>
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
<div class="adBox adtray-250"><iframe src="http://article.axtender.com/250/Mesothelioma-Law-Firm" scrolling="no" frameborder="0"></iframe></div> <div class="like-box-hide">
<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'http://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=334186876754714&version=v2.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<div class='fb-page' data-href='https://www.facebook.com/youpakistan' data-hide-cover='false' data-show-facepile='true' data-show-posts='false'><div class='fb-xfbml-parse-ignore'></div></div> </div>
</div>
</div>
</div>
<div id="footer" class="modal-footer panel-footer">
<div class="container">
<div class="row">
<div class="col-md-6 footer-left">
<a class="margin-right-10" href="terms.html">TOS</a>
<a class="margin-right-10" href="privacy.html">Privacy Policy</a>
<a class="margin-right-10" href="contact.html">Contact us</a>
</div>
<div class="col-md-6 footer-right">
<p class="muted credit copyright" class="copywrite-text">Copyright &copy; 2015, All Rights Reserved!</p>
</div>
</div>
</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-548ss53494-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>