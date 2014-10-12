@extends('content.simple')

@section('filter')@stop

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop

@section('content')
<div id="blog-grid">
    @foreach($posts as $post)
    <div class="row item">
        @if(true)
        <div class="thumb col-md-6">
            <a href="{{asset('')}}{{Request::segment(1)}}/{{$post->alias}}"><img src="{{$post->photos()->orderBy('sort')->first()->img_orig}}" title="{{$post->title}}"/></a>
        </div>
        @endif
        <div class="col-md-5 col-md-offset-1">
            <div class="content">
            <h3><a href="{{asset('')}}{{Request::segment(1)}}/{{$post->alias}}" title="{{$post->title}}">{{$post->title}}</a></h3>
            <div class="text-content">
                <p class="preambula"><a href="{{asset('')}}{{Request::segment(1)}}/{{$post->alias}}" title="читать">{{$post->preambula}}</a></p>
            </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div>{{$posts->links()}}</div>
@stop
