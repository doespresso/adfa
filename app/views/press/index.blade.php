@extends('content.simple')

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop

@section('content')
<div class="row press-list">
<div class="content">
@foreach($magazines as $magazine)
@if($magazine->publications->count())
<div class="col-lg-12 col-md-12 col-xs-12">
<h3><span>{{$magazine->title}}</span></h3>
<ul>
@foreach($magazine->publications as $publication)
<li>
<?php
$publication->load('pub_holder');
?>
<div class="row">
    <div class="col-xs-5 col-sm-2 col-md-3 col-lg-2">{{$magazine->title}}</div><div class="col-xs-2 col-sm-1">№{{$publication->number}}</div><div class="col-xs-2 col-sm-1">{{$publication->year}}</div>
    <div class="col-xs-12 col-sm-8 col-md-7"><a href="{{asset('portfolio/'.$publication->pub_holder->alias)}}">{{$publication->pub_holder->title}}</a></div></div>
</li>
@endforeach
</ul>
</div>
@endif
@endforeach
</div>
</div>
@include('partial.subfooter-index')
@stop
