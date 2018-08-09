<section>
    <div class="index-tit">
        <h1 class="text-center">成功案例与解决方案</h1>
        <h4 class="text-center">企众出品,必属良品</h4>
    </div>

    <div class="container-fluid">
        <div  class="case-index-warp">  <!--data-scroll-reveal-->
            <div class="row">

                @foreach($cases as $case)
                <div class="col-3 case-index-box">
                    <div class="case-item-warp">
                        <img src="{{$disksPath.$case->cover_img}}" alt="{{$case->name}}">
                        <div class="case-item-bg" style="background: url('{{url("img/bg1.png")}}')">
                            <div class="case-item-bg-tit">
                                <a href="{{route('case.info',['case_id' => $case->id])}}"><h3 class="text-center">{{$case->name}}</h3></a>
                                <p class="text-center">
                                    @foreach($case->navs as $cn)
                                    <a class="col" href="{{route('web.website',['nav' => $cn->id])}}">{{$cn->title}}</a>
                                    @endforeach
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </div>

    <div class="case-index-more container text-center" >
        <div class="row offset-3">
            <div class="col-4">
                <a href="{{route('web.website',['nav' => 1])}}">我要看案例</a>
            </div>
            <div class="col-4">
                <a href="#">我要选模板</a>
            </div>
        </div>
    </div>
</section>