<nav id="menu" class="hidden-xs hidden-sm">
    <ul class="menu">
        @foreach($menu_links as $link)
        @if(explode('/',$link->url)[1] == Request::segment(1))
        <li><a class="active" href="{{$link->url}}"@if($link->alt)title="{{$link->alt}}"@endif>{{$link->title}}</a></li>
        @else
        <li><a href="{{$link->url}}"@if($link->alt)title="{{$link->alt}}"@endif>{{$link->title}}</a></li>
        @endif
        @endforeach
    </ul>
</nav>