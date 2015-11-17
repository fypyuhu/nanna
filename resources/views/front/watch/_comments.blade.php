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
        <i class="fa fa-comments"></i>&nbsp;&nbsp;1493 Comments</div>
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
        