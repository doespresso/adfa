@if($slides)
<div class="col-md-12 col-md-offset-0">
    <div class="spotlight" id="presentation">
        <div class="swiper-container l-arrows" id="main-swiper">
            <div class="swiper-wrapper">
                @foreach($slides as $slide)
                <?php
                $obj = get_class($slide->holder);
                $holder = $slide->holder;
                if ($slide->israndom && $slide->holder_type == 'Person') {
                    $holder = Person::random()->active()->first();
                }
                if ($slide->israndom && $slide->holder_type == 'Post') {
                    $holder = Post::random()->active()->first();
                }
                if ($slide->israndom && $slide->holder_type == 'Portfolio'){
                    $holder = Portfolio::random()->active()->first();
                }
                ?>

                @if($obj == 'Portfolio')
                @include('portfolio.slide')
                @elseif($obj == 'Post')
                @include('post.slide-crop')
                @elseif($obj == 'Person')
                @include('person.slide')
                @endif

                @endforeach

            </div>
            <div id="paging" class="swiper-pagination hidden"></div>
            <figure class="ui-arrow-next ui-arrow" id="presentation-next"></figure>
            <figure class="ui-arrow-prev ui-arrow" id="presentation-prev"></figure>
        </div>
    </div>
</div>
@endif

