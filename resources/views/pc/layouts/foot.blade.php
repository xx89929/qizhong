<section>
    <div class="foot" style="background: url('{{url("img/bg1.png")}}')">
        <div class="container ">
            <div class="row">
                <div class="col-7 row">
                    @foreach($top_navs as $tn)
                        @if($loop->index < 4)
                    <div class="foot-item col-3">
                        <h5><a href="{{route('web.website',['nav' => $tn->id])}}">{{$tn->title}}</a></h5>
                        <ul class="list-unstyled">
                            @foreach($sub_navs as $sn)
                                @if($sn->parent_id == $tn->id)
                                    <li><a href="{{route('web.website',['nav' => $sn->id])}}">{{$sn->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                        @endif
                    @endforeach

                </div>

                <div class="col-5 foot-r2">
                    <ul class="list-unstyled">
                        <li>
                            <h5>关于我们</h5>
                            {!! $webInfo->about_us !!}
                        </li>
                    </ul>

                    <ul class="list-unstyled">
                        <li>
                            <h5>联系我们</h5>
                            <p>联系电话：{{$webInfo->phone}}</p>
                            <p>客服热线：{{$webInfo->tel}}</p>
                        </li>
                    </ul>

                </div>
            </div>


            <div class="foot-icp-warp text-center ">
                <div class="foot-icp">
                    <p>Copyright © 2018 海南企众实业有限公司 版权所有 琼ICP备17003672号-1</p>

                </div>
            </div>



        </div>
    </div>
</section>

