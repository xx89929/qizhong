@extends('pc.layouts.base')
@section('content')
    @include('pc.home.index.banner')
    @include('pc.home.index.ourServices')
    @include('pc.home.index.ourCase')
    @include('pc.home.index.news')
    @include('pc.home.index.flow')
    @include('pc.home.index.fb-warp')
    @include('pc.layouts.footBanner')
@endsection

@section('csss')
    @parent
    <link rel="stylesheet" href="{{url('scss/index.css')}}">
@endsection

@section('jss')
    @parent
    <script src="{{url('js/index.js')}}"></script>
@endsection