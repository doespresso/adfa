<!--<div class="photos-wide">-->
<div class="photos-wide">
    <div class="swiper-container c-arrows">
        <div class="swiper-wrapper">
            @foreach ($photos as $photo)
            <div class="swiper-slide">
                <div class="slide-wrapper">
                    <div class="img" data-bg="{{asset($photo->img_big)}}" style="background-image:url({{asset($photo->img_big)}})" data-src="background-image:url({{asset($photo->img_big)}})"></div>
                </div>
            </div>
            @endforeach
        </div>
        <figure class="ui-arrow-next ui-arrow"></figure>
        <figure class="ui-arrow-prev ui-arrow"></figure>
        <div class="swiper-pagination"></div>
    </div>
</div>
