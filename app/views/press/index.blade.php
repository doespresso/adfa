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
<div class="row"><div class="col-sm-4">{{$magazine->title}} №{{$publication->number}} / {{$publication->year}} </div><div class="col-sm-8"><a href="{{asset('portfolio/'.$publication->pub_holder->alias)}}">{{$publication->pub_holder->title}}</a></div></div>
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
