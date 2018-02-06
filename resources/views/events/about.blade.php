@extends('layout')
@section('asset')
    <link rel="stylesheet" href="{{asset('css/mdbootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
@endsection
@section('content')
    @include('events.lang.ru')
@endsection
@section('scripts')
    @include('events.about-scripts')
@endsection