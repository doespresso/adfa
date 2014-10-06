@extends('content.simple')

@section('page-subheader')
@include('partial.subheader-home')
@stop


@section('slider')
@include('home.slider')
@stop

@section('content')

@stop

@section('designers')
@include('person.home')
@stop
