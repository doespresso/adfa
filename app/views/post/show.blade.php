@extends('content.simple')
<?php $photos = $post->photos()->orderBy('sort')->get();?>

@section('page-subheader')
@include('partial.subheader-show')
@stop

@section('slider')
@include('slider.photos')
@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-9">
        <div class="content">
            @if(!empty($post->text)){{$post->text}}@endif
        </div>
    </div>
</div>
@stop

@section('pager')
@include('partial.pager')
@stop