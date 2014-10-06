<div class="swiper-slide">
    <div class="row content-title text-white">
        <div class="col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0">
<!--            <div class="press-link">-->
<!--                @if($holder->publication->first())-->
<!--                @include('partial.published')-->
<!--                @endif-->
<!--            </div>-->
            <figure class="title">
                <a href="{{asset('portfolio/'.$holder->alias)}}"><span>{{$holder->title}}</span></a>
                <?php $pr=$holder;?>
                @include('partial.published-small')
            </figure>
        </div>
    </div>
    <a href="{{asset('portfolio/'.$holder->alias)}}" class="slide-wrapper" style="background-image:url({{asset($holder->photos()->orderBy('sort')->first()->img_big)}})"></a>
</div>