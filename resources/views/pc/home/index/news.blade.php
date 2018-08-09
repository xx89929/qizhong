<section>
    <div class="container">
        <div class="news-index">
            {{--<div class="index-tit">--}}
                {{--<h1 class="text-center">新闻媒体咨询</h1>--}}
                {{--<h4 class="text-center">企众出品,必属良品</h4>--}}
            {{--</div>--}}

            <div class="news-warp">
                <div class="row">
                    @foreach($news as $new)
                    <div class="col-4 news-item-warp">
                        <label>{{$new->updated_at}}</label>
                        <h4 title="{{$new->title}}"><a href="{{route('news.info',['news_id' => $new->id])}}">{{$new->title}}</a></h4>
                        <label>标签:</label>
                        @foreach($new->tags as $nt)
                            <span><a href="{{route('news',['tags_id' => $nt->id])}}">{{$nt->tag_name}}</a></span>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
