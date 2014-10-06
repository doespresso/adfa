<div class="swiper-slide">
    <div class="row photo-title">
        <div class="col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0">
            <a class="photo" href="{{asset('designtrends/'.$holder->alias)}}" style="background-image:url({{asset($holder->photos()->orderBy('sort')->first()->img_medium)}})"></a>
        </div>
    </div>
    <div class="row content-title reply">
        <div class="col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0">
            <figure class="title"><a href="{{asset('designtrends/'.$slide->holder->alias)}}"><span>{{$holder->title}}</span></a></figure>
        </div>
    </div>
    <div class="slide-wrapper" style="background-color:#eee">
    </div>
</div>