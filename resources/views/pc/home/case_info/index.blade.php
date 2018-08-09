@extends('pc.layouts.base')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('/')}}">首页</a></li>
                <li class="breadcrumb-item"><a href="{{route('web.website',['nav' => $crumbs_last->id])}}">{{$crumbs_last->title}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$case->name}}</li>
            </ol>
        </nav>

        <div class="case-info-warp">
            <div class="case-info-title text-center">
                <h1 >{{$case->name}}</h1>
                <h5>{{$case->updated_at}}</h5>
                <ul class="list-inline">
                    标签：
                    @foreach($case->navs as $cc)
                        <li class="list-inline-item"><a  title="{{$cc->title}}" href="{{route('web.website',['nav' => $cc->id])}}">{{$cc->title}}</a></li>
                    @endforeach

                    @if(isset($case->href))
                    <span class="demo-btn"><a title="{{$case->name}}" href="{{$case->href}}" target="_blank">演示地址</a></span>
                    @endif
                </ul>
            </div>

            <div class="case-info-content">
                {!! $case->content !!}
            </div>

            @if(!empty($case->pc_img))

            <div class="bg-pc-warp">
                <img class="bg-pc-display img-fluid" src="{{url('img/bg_mac_display.jpg')}}">
                <div class="case-pc-warp">
                    <img alt="{{$case->name}}" class="img-fluid" src="{{$disksPath.$case->pc_img}}">
                </div>
            </div>

            @endif



            @if(!empty($case->mobile_img))
            <div class="bg-mobile-warp">
                <img class="bg-mobile-display mx-auto d-block" src="{{url('img/mobile_phonex_display.jpg')}}">
                <div class="case-mobile-warp">
                    <img alt="{{$case->name}}" class="img-fluid" src="{{$disksPath.$case->mobile_img}}">
                </div>
            </div>

            @endif

        </div>
    </div>


    @include('pc.layouts.footBanner')

@endsection

@section('csss')
    @parent
    <link rel="stylesheet" href="{{asset('scss/case_info.css')}}">
@endsection

@section('jss')
    @parent
    <script>
        $('.case-pc-warp > img').hover(function () {
            var imgHeight = $(this).height() - 589;
            $(this).stop().animate({'margin-top': -imgHeight},3000);
        },function () {
            $(this).stop().animate({'margin-top': 0},3000);
        })

        $('.case-mobile-warp > img').hover(function () {
            var imgHeight = $(this).height() - 531;
            $(this).stop().animate({'margin-top': -imgHeight},3000);
        },function () {
            $(this).stop().animate({'margin-top': 0},3000);
        })
    </script>
@endsection

@section('title')
    {{$case->name}}
@endsection