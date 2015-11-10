@extends('front.template')

@section('main')
<div class="container white-bg">
<div class="row">
<div class="col-md-8 margin-bottom-15" style="border-right:1px solid #CCC">
<div class="page-header" style="border-bottom:2px solid #CCC">
<form action="http://www.youpak.com/search" id="searchmobile" style="display:none;" role="form" class="navbar-form navbar-search">
<span class="twitter-typeahead" style="position: relative; display: inline-block;">
<input id="searchInput" type="text" class="search-input form-control typeahead tt-query" placeholder="Search Videos / Youtube video link" name="q" value="">
<input type="hidden" value="type">
<button type="submit" class="btn navbar-search-btn"><i class="fa fa-search btn-bg-blue"></i></button>
</span>
</form>
<style>h3{color:#515151;font-size:15px;line-height:1.31;font-weight:700;}</style>
<h2>Terms of Service</h2>
</div>
<h3>1. Terms</h3>
<p>
By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.
</p>
<h3>2. Use License</h3>
<ol type="a">
<li>Permission is granted to temporarily download one copy of the materials (information or software) on youpak.com's web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
<ol type="i">
<li>modify or copy the materials;</li>
<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
<li>attempt to decompile or reverse engineer any software contained on youpak.com's web site;</li>
<li>remove any copyright or other proprietary notations from the materials; or</li>
<li>transfer the materials to another person or "mirror" the materials on any other server.</li>
</ol>
</li>
<li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by youpak.com at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
</ol>
<h3>3. Disclaimer</h3>
<ol type="a">
<li>The materials on youpak.com's web site are provided "as is". youpak.com makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, youpak.com does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</li>
<li> We do not exercise or otherwise promote copyright infringement. All the videos on Youtube are copyrights of their respective owners and any copyright infringement resulting from their transfer to Facebook will be liability of the user performing such action. <br>
We also do not store videos on our servers, they are cached and subsequently destroyed, once the upload has completed. </li>
</ol>
<h3>4. Limitations</h3>
<p>
In no event shall youpak.com or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on youpak.com's Internet site, even if youpak.com or a youpak.com authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
</p>
<h3>5. Revisions and Errata</h3>
<p>
The materials appearing on youpak.com's web site could include technical, typographical, or photographic errors. youpak.com does not warrant that any of the materials on its web site are accurate, complete, or current. youpak.com may make changes to the materials contained on its web site at any time without notice. youpak.com does not, however, make any commitment to update the materials.
</p>
<h3>6. Links</h3>
<p>
youpak.com has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by youpak.com of the site. Use of any such linked web site is at the user's own risk.
</p>
<h3>7. Site Terms of Use Modifications</h3>
<p>
youpak.com may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
</p>
<h3>8. Governing Law</h3>
<p>
Any claim relating to youpak.com's web site shall be governed by the laws of the State of Punjab without regard to its conflict of law provisions.
</p>
<p>
General Terms and Conditions applicable to Use of a Web Site.
</p>
</div>
<div class="col-md-4">
<div class="like-box-hide"> <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = '../connect.facebook.net/en_US/sdk.js#xfbml=1&appId=334186876754714&version=v2.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<div class='fb-page' data-href='https://www.facebook.com/youpakistan' data-hide-cover='false' data-show-facepile='true' data-show-posts='false'><div class='fb-xfbml-parse-ignore'></div></div> </div>
</div>
</div>
</div>
@stop


