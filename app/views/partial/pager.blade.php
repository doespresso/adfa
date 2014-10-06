<div class="row hidden">
    @if(isset($prev))
    <a href="{{asset('')}}{{Request::segment(1)}}/{{$prev->alias}}" class="prev">{{$prev->title}}</a>
    @endif
    @if(isset($next))
    <a href="{{asset('')}}{{Request::segment(1)}}/{{$next->alias}}" class="prev">{{$next->title}}</a>
    @endif
</div>

