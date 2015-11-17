@extends('front.template')

@section('headInclude')
@include('front.watch._headerIncludes')

@stop

@section('footerScript')
@include('front.watch._footerScripts')
@stop


@section('main')
    <div class="container white-bg">
        <div class="row">
         @include('front.watch._scripts')
            <div class="col-md-8 row-border">
                @include('front.partials.msearch')

                @include('front.watch._download',compact('video'))
                @include('front.watch._player',compact('video'))
                @include('front.watch._info',compact('video'))
                @include('front.partials.bannerAd')
                @include('front.watch._content',compact('video'))
                @include('front.watch._comments',compact('video'))
             </div>
           
                @include('front.watch._related',compact('video'))


                @include('front.partials.bannerAd')
          
        </div>
    </div>
        
<!--fixes-->

</div>
</div>
<!--end fixes-->

@stop


