<section class="head">
    <div class="container head-warp">
        <div class="row">
            <div class="col logo-warp">
                <a href="{{route('/')}}">
                    <img class="img-responsive" src="{{$disksPath.$webInfo->logo_path}}" alt="海南企众实业有限公司logo">
                </a>
            </div>
            <div class="col navs-warp">
                <div class="row">
                    <a href="{{route('web.website',['nav' => 1])}}">网站建设</a>
                    <a href="{{route('web.website',['nav' => 2])}}">电商建设</a>
                </div>
                <div class="row">
                    <a href="{{route('web.website',['nav' => 3])}}">网络运营</a>
                    <a href="{{route('web.website',['nav' => 4])}}">移动端</a>
                </div>
                <a href="{{route('web.website',['nav' => 5])}}"><p>DT</p><span>数据技术</span></a>
            </div>
            <div class="col navs-main-warp">
                <div class="row head-contact ">
                    <span>{{$webInfo->phone}}</span>
                    <span>{{$webInfo->tel}}</span>

                </div>
                <div class="row navs-main">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{route('/')}}">企众首页</a></li>
                        <li class="list-inline-item"><a href="{{route('news')}}">新闻资讯</a></li>
                        <li class="list-inline-item"> <a href="#">网站模板</a></li>
                        <li class="list-inline-item"><a href="{{route('contact')}}">联系我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="sub-navs-warp">
        <div class="container clearfix">
            <div class="row">
                @foreach($top_navs as $tn)
                <div class="col sub-navs-box">
                    <h3><a href="{{route('web.website',['nav' => $tn->id])}}">{{$tn->title}}</a></h3>
                    <ul class="list-unstyled">
                        @foreach($sub_navs as $sn)
                            @if($sn->parent_id == $tn->id)
                                <li><a href="{{route('web.website',['nav' => $sn->id])}}">{{$sn->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            <div class="row">


                <div class="head-b1 col">
                    <h3>全部案例</h3>
                    <ul class="list-inline">
                        @foreach($special_category as $sc)
                        <li class="list-inline-item" style="background: url('{{asset("img/bg5.png")}}') repeat center"><a href="#">{{$sc->title}}</a></li>
                        @endforeach
                    </ul>
                </div>



                <div class="head-b2 col">
                    <p>{{$webInfo->phone}}</p>
                    <p>{{$webInfo->tel}}</p>
                    <button class="btn">还在想？赶快联系我们吧！</button>
                </div>
            </div>
        </div>
    </div>
</section>


@section('jss')
    <script>
        $('.head-warp,.sub-navs-warp').hover(function () {
            $('.sub-navs-warp').addClass('show')
            $('.sub-navs-box').addClass('show')
            $('.head-b1').addClass('show')
            $('.head-b2 p ,.head-b2 button').addClass('show')

        },function () {
            $('.sub-navs-warp').removeClass('show')
            $('.sub-navs-box').removeClass('show')
            $('.head-b1').removeClass('show')
            $('.head-b2 p ,.head-b2 button').removeClass('show')
        })
    </script>
@endsection