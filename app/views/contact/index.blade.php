@extends('content.simple')

@section('filter')@stop

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop


@section('content')

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <p class="content qrcode">{{Setting::get('contact.qr');}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="content">
            {{Setting::get('contact.address');}}<br/>
            {{Setting::get('contact.phone');}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="content">
            {{Setting::get('contact.e-mail');}}
        </div>
    </div>
</div>
@include('partial.subfooter-index')
@stop
