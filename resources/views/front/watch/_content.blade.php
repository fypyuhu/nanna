<div>
<div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#about-tab" data-toggle="tab"><i class="fa fa-bullhorn"></i><span class="about-tab-title">&nbsp;About</span></a></li>
            <li><a href="#share-tab" data-toggle="tab"><i class="fa fa-link"></i><span class="share-tab-title">&nbsp;Share / Embed</span></a></li>
            <li><a href="#report-tab" data-toggle="tab"><i class="fa fa-flag"></i><span class="report-tab-title">&nbsp;Report<span></a></li>
            </ul>
        <div id="my-tab-content" class="tab-content">
        <div class="tab-pane fade active in" id="about-tab">
        <h4 class="font-weight-bold"><i class="fa fa-clock-o"></i>&nbsp;Published On {!!$video["publishOn"]!!}</h4>
        <div style="font-size: 16px;font-weight: bold;">Category: <a class="title-color" href="/category?id={!!$video["catID"]!!}">{!!$video["catTitle"]!!}</a></div>
        <div id="about" class="overflow-hidden" style="background-image:linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)"><p>{!!$video["description"]!!}</p></div>
        <div class="show-more closed">show more<span class="caret"></span></div>
        </div>
        <div class="tab-pane fade" id="share-tab">
        <h4 class="font-weight-bold">Share/Embed</h4>
        <div class="mbl">
        <button class="btn btn-facebook" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=http://www.youpak.com/watch?v=dHPxkZ7S_H8','','fullscreen')"><i class="fa fa-facebook"></i><span class="share-btn-title"> Facebook</span></button>
        <button class="btn mlxs btn-twitter" onclick="window.open('http://twitter.com/intent/tweet?url=http://www.youpak.com/watch?v=dHPxkZ7S_H8&text=&hashtags=youpakcom','','fullscreen')"><i class="fa fa-twitter"></i><span class="share-btn-title"><span class="share-btn-title"> Twitter</span></button>
        <button class="btn mlxs btn-pinterest" onclick="window.open('http://pinterest.com/pin/create/button/?url=http://www.youpak.com/watch?v=dHPxkZ7S_H8&media=https://i.ytimg.com/vi/dHPxkZ7S_H8/0.jpg&description=Tung Tung Baje - Singh Is Bliing | Akshay Kumar & Amy Jackson | Diljit Dosanjh & Sneha Khanwalkar','','fullscreen')"><i class="fa fa-pinterest"></i><span class="share-btn-title"> Pinterest</span></button>
        <button class="btn mlxs btn-linkedin" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=http://www.youpak.com/watch?v=dHPxkZ7S_H8&title=Tung Tung Baje - Singh Is Bliing | Akshay Kumar & Amy Jackson | Diljit Dosanjh & Sneha Khanwalkar&summary=Tung Tung Baje - Singh Is Bliing | Akshay Kumar & Amy Jackson | Diljit Dosanjh & Sneha Khanwalkar&source=youpak','','fullscreen')"><i class="fa fa-linkedin"></i><span class="share-btn-title"> LinkedIn</span></button>
        <button class="btn mlxs btn-google-plus" onclick="window.open('http://plus.google.com/share?url=http://www.youpak.com/watch?v=dHPxkZ7S_H8','','fullscreen')"><i class="fa fa-google-plus"></i><span class="share-btn-title"> Google Plus</span></button>
        </div>
        <div class="video-content">
        <div class="row input-group social-btns">
        <div class="tab-pane fade active in width-full">
        <div class="clearfix"></div>
        <h4 class="font-weight-bold">Video Link</h4>
        <div class="input-group col-md-8 width-full">
        <span class="input-group-addon"><i class="fa fa-link"></i></span>
        <input type="text" id="shareable_link" value="http://www.youpak.com/watch?v=dHPxkZ7S_H8" class="form-control" onclick="$(this).select()">
        </div>
        <h4 class="font-weight-bold">Embed Video</h4>
        <div class="video-embed relative clearfix">
        <div class="input-group mbm col-md-12">
        <span class="input-group-addon">
        <i class="fa fa-expand"></i>
        </span>
        <textarea name="embed_code" id="embed_code" onclick="this.select()" class="form-control height">&lt;iframe width="600" height="350" src="http://www.youpak.com/embed?v=dHPxkZ7S_H8" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</textarea>
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