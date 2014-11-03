@extends('layouts.page')
@section('page-content')
<div class="row" id="static-page-title" name="pagetop"></div>

<div class="row" id="page-subheader">
    <div class="col-lg-5 col-md-5 col-sm-12 col-md-offset-4 col-xs-12">
        @yield('page-subheader')
    </div>
</div>

<div id="visual">
@yield('slider')
</div>

<div class="row" id="page-content">
    <div class="col-lg-8 col-md-8 col-sm-12 col-md-offset-4 col-xs-12">
        @yield('content')
    </div>
</div>

<div class="row" id="page-pager">
    <div class="col-lg-7 col-md-8 col-sm-12 col-md-offset-4 col-xs-12">
        @yield('pager')
    </div>
</div>



@yield('designers')


@stop