<?php $photos = $portfolio->photos()->orderBy('sort')->get();?>
@extends('content.simple')

@section('page-subheader')
@include('partial.subheader-show')
@stop

@section('slider')
@include('slider.portfolio')
@stop

@section('content')
<div class="row" id="portfolio-elem">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="press-link">
                @if($portfolio->publication->first())
                <?php $pr=$portfolio;?>
                @include('partial.published')
                @endif
            </div>
            <div class="content">
                @if(!empty($portfolio->preambula))<h3><span>{{$portfolio->preambula}}</span></h3>@endif
                @if(!empty($portfolio->description)){{$portfolio->description}}@endif
                <p>
                @if(!empty($portfolio->area)){{$portfolio->area}} m<sup>2</sup> / @endif
                @if(!empty($portfolio->style->title)){{$portfolio->style->title}}@endif
                @if(!empty($portfolio->publication->first()->photographer))фотограф &mdash; {{$portfolio->publication->first()->photographer}}
                @endif
                @if($portfolio->publication->first())
                <br/>
                    {{$portfolio->publication->first()->magazin->title}}
                    № {{$portfolio->publication->first()->number}}
                    /{{$portfolio->publication->first()->year}}г<br/>
                @endif
                </p>
            </div>
        </div>
    </div>

</div>
@stop

@section('pager')
@include('partial.pager')
@stop