@extends('content.simple')

@section('filter')@stop

@section('page-subheader')
@include('partial.subheader-index')
@stop

@section('slider')@stop


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="content">
        <p>{{Setting::get('contact.phone');}} / {{Setting::get('contact.address');}}<br/>{{Setting::get('contact.e-mail');}}</p>
        <p class="qrcode">{{Setting::get('contact.qr');}}</p>
        </div>
    </div>
</div>
<div class="col-md-12">
</div>
@include('partial.subfooter-index')
@stop
