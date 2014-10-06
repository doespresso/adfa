<div id="page-slider">
    <div class="spotlight" id="gallery">
        @if($portfolio->publication->first())
        @include('partial.published')
        @endif
        <div class="swiper-container" id="gallery-swiper">
        <div class="swiper-wrapper">
                @foreach ($portfolio->gallery->first()->pics as $photo)
                <div class="swiper-slide">
                    <div class="slide-wrapper lazy" data-original="{{asset($photo)}}" style="background-image:url(''); background-color:;">
                    </div>
                </div>
                @endforeach
            </div>
            <figure class="ui-arrow-next ui-arrow" id="gallery-next"></figure>
            <figure class="ui-arrow-prev ui-arrow" id="gallery-prev"></figure>
            </div>
            <div id="gallery-paging" class="swiper-pagination"></div>
        </div>
    </div>
</div>