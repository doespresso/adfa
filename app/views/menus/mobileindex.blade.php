<div class="overlay overlay-corner">
    <button type="button" class="overlay-close">Close</button>
    <nav>
        <ul>
            @foreach($menu_links as $link)
            <li><a href="{{$link->url}}"@if($link->alt)title="{{$link->alt}}"@endif>{{$link->title}}</a></li>
            @endforeach
        </ul>
    </nav>
</div>