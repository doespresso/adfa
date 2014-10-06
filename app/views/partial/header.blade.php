<div id="menu-opener"><figure></figure><figure></figure><figure></figure></div>
<div class="line-top"></div><div class="line-bottom"></div><div class="line-left"></div><div class="line-right"></div>
<div id="body-bg"><div id="bg-contents"><figure id="bg-logo">artdefacto</figure></div></div>
<div class="row" id="fixed-wrapper">
    <div class="col-md-3 col-md-offset-1 col-xs-4">
        <div id="logo">
            <figure class="adf small-logo">
                <a href="{{asset('')}}" title="{{Config::get('app.sitename')}} - {{Config::get('app.siteslogan')}}"><svg version="1.1" id="adf" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 422.18 208.1" enable-background="new 0 0 422.18 208.1" xml:space="preserve"><g id="adf"><polygon id="f" points="388.633,2.998 356.842,2.998 356.842,45.546 356.842,88.094 356.842,205.103 388.633,205.103 388.633,88.094 402.348,88.094 402.348,45.546 419.18,45.546 419.18,2.998 "/><path id="d" d="M252.178,103.605c0-41.108-21.057-77.612-53.63-100.607v201.214C231.121,181.218,252.178,144.712,252.178,103.605z"/><polygon id="a" points="48.425,2.998 3,205.103 48.425,205.103 93.852,205.103 "/></g></svg></a>
            </figure>
        </div>
        @include('menus.index')
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="title-header">
        @if($page->show_brand)
        <figure id="brand-name">artdefacto</figure>
        @if($page->show_slogan)<figure id="slogan" class="hidden-xs">бюро интерьера Михайловой и Куценко</figure>@endif
        @endif
        @if($page->show_title_static != 1 && !($page->show_brand))
        @if(isset($show))
            <div class="div-title"><a href="{{asset('').$page->alias}}">{{$page->title}}</a></div>
        @else
            @if($page->alias != '/')
            <h1><span>{{$page->title}}</span></h1>
            @if(isset($showfilter))
            @include('partial.filter')
            @endif
            @endif
        @endif
        @endif
        </div>
    </div>
</div>