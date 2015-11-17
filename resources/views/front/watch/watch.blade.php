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

                @include('front.watch._download')
                @include('front.watch._player')
                @include('front.watch._info')
                @include('front.partials.bannerAd')
                @include('front.watch._content')
                @include('front.watch._comments')
             </div>
           
                @include('front.watch._related')


                @include('front.partials.bannerAd')
          
        </div>
    </div>
        
<!--fixes-->

</div>
</div>
<!--end fixes-->

@stop


