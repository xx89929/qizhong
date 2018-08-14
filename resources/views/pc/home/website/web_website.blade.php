@extends('pc.layouts.base')
@section('content')
    <div class="banner-website-warp">
        @if(!empty($nav->banner_img))
        <div class="banner-website-box" style="background-image: url({{$disksPath.$nav->banner_img}});">
        @else
        <div class="banner-website-box" style="background-image: url({{url('img/banner1.jpg')}});">
        @endif
            <div class="container banner-website-title text-center">
                @if(!empty($nav->banner_big_title))<h1>{{$nav->banner_big_title}}</h1>@else <h1>{{$nav->title}}</h1>  @endif
                @if(!empty($nav->banner_title))<h4>{{$nav->banner_title}}</h4>@endif
                @if(!empty($nav->banner_small_title))<p>{{$nav->banner_small_title}}</p>@endif
            </div>

            <div class="banner-navs-warp">
                <div class="container">
                    <ul class="list-inline">
                        @foreach($webnavs as $wn)
                        <li class="list-inline-item"><a href="{{route('web.website',['nav' => $wn->id])}}">{{$wn->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

        @if(!empty($nav->template))
            @include("pc.home.sub-template.$nav->template")
        @endif

    <section>
        <div class="container">
            <div class="case-title">
                <h1 class="text-center">相关案例</h1>
                <h4 class="text-center">Case</h4>

                <svg width="100%" height="100%" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" class="case-title-svg">
                    {{--<path class="case-title-fill" d="--}}
                    {{--M0 90 H480 V110 H660 V90 H1140--}}
                    {{--" />--}}

                    {{--<path class="case-title-fill" d="--}}
                    {{--M0 90 H480 V72 H660 V90 H1140--}}
                    {{--" />--}}

                    <path class="case-title-path" d="
                    M0 90 H480 V110 H660 V90 H1140
                    " />

                    <path class="case-title-path" d="
                    M0 90 H480 V72 H660 V90 H1140
                    " />

                </svg>
            </div>

            <div class="case-warp">
                <div class="row">
                    @foreach($cases as $case)
                    <div class="col-4">
                        <div class="case_item">
                            <img alt="{{$case->name}}" class="img-responsive" src="{{$disksPath.$case->cover_img}}">
                            <div class="case-item-bg-warp" style="background: url('{{url("img/bg1.png")}}')">
                                <div class="case-item-bg-title text-center">
                                    <h3><a href="{{route('case.info',['case_id' => $case->id])}}">{{$case->name}}</a></h3>
                                    <p>
                                        @foreach($case->navs as $cc)
                                        <a class="col" href="{{route('web.website',['nav' => $cc->id])}}">{{$cc->title}}</a>
                                        @endforeach
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="global-bottom-warp text-center">
                <h1>这只是个开始，我们每天都在进步</h1>
                <h3><a href="#">我想做个更好的网站</a></h3>
            </div>
        </div>

    </section>

    @include('pc.layouts.footBanner')
@endsection

@section('title')
    {{$nav->title}}
@endsection


@section('csss')
    @parent
    <link rel="stylesheet" href="{{asset('scss/website.css')}}" />
@endsection

