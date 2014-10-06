<!--<div class="photos-wide">-->
<div class="photos-wide">
    <div class="swiper-container c-arrows">
        <div class="swiper-wrapper">
            @foreach ($photos as $index => $photo)
            <div class="swiper-slide">
                <div class="slide-wrapper">
                    <a class="img zoomlink" rel="imagelightbox" href="{{asset($photo->img_big)}}" data-src="{{asset($photo->img_big)}}"></a>
                </div>
            </div>
            @endforeach
        </div>
        <figure class="ui-arrow-next ui-arrow"></figure>
        <figure class="ui-arrow-prev ui-arrow"></figure>
        <div class="swiper-pagination"></div>
    </div>
</div>
