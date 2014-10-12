<?php $photos = $portfolio->photos()->orderBy('sort')->get();?>
@extends('content.simple')



@section('slider')
<div class="row portfolio-title">
    <div class="col-lg-5 col-md-5 col-sm-10 col-md-offset-4 col-xs-12">
        @include('partial.subheader-show')
        @if($portfolio->photos()->orderBy('sort')->first())
        <?php $pr = $portfolio?>
        @include('partial.published-small')
        @endif
    </div>
    <div class="col-lg-1 col-md-1 hidden">@if(!empty($portfolio->area)){{$portfolio->area}} m<sup>2</sup>@endif</div>
</div>
@include('slider.portfolio')
@stop

@section('content')
<div class="row" id="portfolio-elem">
    <div class="row">
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="content">
                @if(!empty($portfolio->preambula))<div class="preambula">{{$portfolio->preambula}}</div>@endif
                @if(!empty($portfolio->description)){{$portfolio->description}}@endif
            </div>
        </div>
    </div>

</div>
@stop

@section('pager')
@include('partial.pager')
@stop