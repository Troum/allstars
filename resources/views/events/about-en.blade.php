@extends('layout')
@section('asset')
    <link rel="stylesheet" href="{{asset('css/mdbootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
@endsection
@section('content')
    @include('events.lang.en')
@endsection
@section('scripts')
    @include('events.about-scripts')
@endsection