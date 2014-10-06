@extends('content.simple')

@section('filter')@stop

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop

@section('content')
<div class="row portfolio-grid" id="shuffle">
    @foreach($portfolios as $portfolio)
    <a href="{{asset('')}}{{Request::segment(1)}}/{{$portfolio->alias}}" class="item" data-groups='["all", "{{$portfolio->style->title}}"]' data-src="{{$portfolio->photos()->orderBy('sort')->first()->img_medium}}">
            <h3 class="title"><span>{{$portfolio->title}}</span></h3>
            @if($portfolio->photos()->orderBy('sort')->first())
            <?php $pr = $portfolio?>
            @include('partial.published-small')
            @endif
    </a>
    @endforeach
</div>

@stop
