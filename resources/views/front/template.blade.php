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
    <![endif]-->
@yield('headInclude')

<script type="text/javascript">
        
        
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


    <section>
        
   @yield('main')
        
        
    </section>   
     


     
     
     

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