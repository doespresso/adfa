@extends('content.simple')

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop

@section('content')
<div class="row larger" id="personal-grid">
    @foreach($persons as $person)
    <div class="col-sm-12 col-md-11 col-lg-5">
        <div class="media m">
            <a title="{{$person->title}}" class="media-object pull-left" href="/designers/{{$person->alias}}">
                <figure class="photo" style="background-image:url('{{asset($person->img)}}')"></figure>
            </a>
            <div class="media-body">
                <a href="/designers/{{$person->alias}}"><div class="content">
                    <h3 class="media-heading"><span>{{$person->quote}} ...</span></h3>
                    {{$person->quotetext}}
                </div></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row"><div class="content"><h2 class="title-logo">artdefacto</h2></div></div>
@include('partial.subfooter-index')

@stop




