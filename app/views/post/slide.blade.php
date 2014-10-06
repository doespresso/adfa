<div class="swiper-slide">
    <div class="row content-title">
        <div class="col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0">
            <figure class="title">
                <a href="{{asset('designtrends/'.$holder->alias)}}"><span>{{$holder->title}}</span></a>
            </figure>
        </div>
    </div>
    <div class="slide-wrapper" style="background-image:url({{asset($holder->photos()->orderBy('sort')->first()->img_orig)}})"></div>
</div>