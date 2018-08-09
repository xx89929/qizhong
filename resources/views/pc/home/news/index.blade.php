@extends('pc.layouts.base')


@section('content')
    <div class="news-banner" style="background: url('http://www.fractal-technology.com/Public/static/themes/image/bg2.jpg')">
    </div>

    <div class="container">
        <div class="row news-tags-warp">
            @foreach($tags as $tag)
            <div class="col-3 text-center news-tags-item">
                <h5><a href="{{route('news',['tag_id' => $tag->id])}}">{{$tag->tag_name}}</a></h5>
            </div>
            @endforeach
        </div>
        <div class="news-warp clearfix">
            {{--<div class="row">--}}
                @foreach($news as $n)
                    <div class="col-6">
                        <div class="news-item">
                            @if(!empty($n->banner))
                                <div class="news-item-banner">
                                    <a href="{{route('news.info',['news_id' => $n->id])}}">
                                        <img class="img-fluid" src="{{$disksPath.$n->banner}}">
                                    </a>

                                </div>
                            @endif
                            <h3 title="{{$n->title}}"><a href="{{route('news.info',['news_id' => $n->id])}}">{{$n->title}}</a></h3>
                            <ul class="list-inline">
                                标签：
                                @foreach($n->tags as $nt)
                                <li class="list-inline-item"><a title="{{$nt->tag_name}}" href="{{route('news',['tag_id' => $nt->id])}}">{{$nt->tag_name}}</a></li>
                                @endforeach
                            </ul>
                            <div class="news-description">
                                <p>{{$n->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            {{--</div>--}}
        </div>

    </div>
@endsection

@section('csss')
    <link rel="stylesheet" href="{{asset('scss/news.css')}}">
@endsection

