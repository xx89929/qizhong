@extends('pc.layouts.base')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('/')}}">首页</a></li>
                <li class="breadcrumb-item"><a href="{{route('news')}}">新闻资讯</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
            </ol>
        </nav>


        <div class="row" style="margin-top: 50px">
            <div class="news-info-warp col-8">
                <div class="news-info-head">
                    <h1 class="text-center">{{$news->title}}</h1>
                    <p class="news-info-time text-center">{{$news->created_at}}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="iconfont icon-QQ" style="color: rgb(104, 165, 225)"></i></li>
                        <li class="list-inline-item"><i class="iconfont icon-weixin" style="color: rgb(80, 182, 116)"></i></li>
                        <li class="list-inline-item"><i class="iconfont icon-weibo" style="color: rgb(234, 93, 92)"></i></li>
                        <li class="list-inline-item">
                            <span>分享数：{{$news->share_num}}</span>
                        </li>

                        @if(!empty($news->original_href))
                            <li class="list-inline-item">
                                原创链接：<a href="{{$news->original_href}}" target="_blank">点击进入原创</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="news-info-content">
                    {!! $news->content !!}
                </div>

                <div class="row news-btn-warp">
                    <div class="col-6 ">
                        @if(isset($pre_news))
                        <div class="pre-news-btn news-btn text-center">
                            <a title="{{$pre_news->title}}" href="{{route('news.info',['news_id' => $pre_news->id])}}">上一篇：{{$pre_news->title}}</a>
                        </div>
                        @endif
                    </div>

                    <div class="col-6">
                        @if(isset($next_news))
                        <div class="next-news-btn news-btn text-center">
                            <a  title="{{$next_news->title}}" href="{{route('news.info',['news_id' => $next_news->id])}}">下一篇：{{$next_news->title}}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="news-info-float-side col-4">
                <div class="news-side-f1" style="background: url({{asset('img/bg1.png')}})">
                    <h2>相关资讯</h2>

                    <ul class="list-unstyled">
                        @foreach($related_news as $rn)
                        <li><a href="{{route('news.info',['news_id' => $rn->id])}}">{{$rn->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

    @include('pc.layouts.footBanner')
@endsection

@section('csss')
    @parent
    <link rel="stylesheet" href="{{asset('scss/news_info.css')}}">
@endsection

@section('title')
    {{$news->title}}
@endsection