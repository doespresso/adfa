@extends('content.simple')
@section('slider')

<div class="container">

</div>

@stop
@section('content')
<div class="row">
    <div class="col-md-3">
        <img class="person" src="{{asset($person->img)}}">
    </div>
    <div class="col-md-6 col-md-offset-1">
        <div class="content">
            <h1>{{$person->title}}</h1>
            @if(!empty($person->quote))<blockquote class="personal">{{$person->quote}} ...</blockquotes>@endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="post-content">
            <div class="content personal-text">
                @if(!empty($person->quotetext)){{$person->quotetext}}@endif
            </div>
        </div>
    </div>
</div>
@stop