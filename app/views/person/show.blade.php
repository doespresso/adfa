@extends('content.simple')
@section('slider')
@if(!empty($post->img))
<div class="row">
    <div class="col-md-12 col-md-offset-0">
      <figure class="post-front-img">
          <img src="{{asset('')}}/{{$post->img}}"/>
      </figure>
    </div>
</div>
@endif
@stop
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="post-content">
        <div class="content">
            @if(!empty($post->preambula))<p>{{$post->preambula}}</p>@endif
            @if(!empty($post->text))<p>{{$post->text}}</p>@endif
        </div>
        </div>
    </div>
</div>
@stop