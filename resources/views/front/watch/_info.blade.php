 <div>
            <div class="video-title">{!!$video["title"]!!}</div>
            <div class="row">
                <div class="channelDetails col-sm-8">
                    <a href="channel?id={!!$video["channelID"]!!}">
                    <img src="{!!$video["cLogo"]!!}" class="channelThumb" alt="{!!$video["channelName"]!!}">
                    </a>
                    <a class="uploader-name" href="channel?id={!!$video["channelID"]!!}">{!!$video["channelName"]!!}</a>
                    <div style="margin-top:4px">
                        <div id="subscribeButton" class="btn btn-danger btn-xs pull-left" data-action="subscribe"><i class="fa fa-youtube-play"></i> Subscribe</div>
                        <div style="display: inline-block;"><div class="subscriberCount"><span class="subscripberNum">{!!$video["sCount"]!!}</span></div><div class="subscriberCountNub"><s></s><i></i></div></div>
                    </div>
                </div>
                <div class="text-right col-sm-4">
                    <div class="font-size-16"> {!!$video["vCount"]!!} views </div>
                    <div class="progress">
                        <div style="width: {!! ($video["lCount"]/($video["lCount"]+ $video["dLCount"]))*100!!}%;" class="progress-bar progress-bar-warning"></div>
                    </div>
                    <div class="font-size-13">
                        <span id="likeButton" data-action="like" data-toggle="tooltip" data-placement="top" title="" data-original-title="I like this">
                            <span id="icon" style="font-size:20px"><i class="fa fa-thumbs-up "></i></span> 
                            {!!$video["lCount"]!!}
                        </span>
                        <span id="disLikeButton" data-action="dislike" data-toggle="tooltip" data-placement="top" title="" data-original-title="I dislike this">
                            <span id="icon" style="font-size:20px"><i class="fa fa-thumbs-down "></i></span>
                            {!!$video["dLCount"]!!}
                        </span>
                    </div>
                </div>
            </div>
        </div>