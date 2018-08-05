<section>
    <div class="container">
        <div class="fb-warp text-center">
            <div class="fB-button">
                <h3><a href="#">立刻体验</a></h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="fb-button-svg" version="1.1" width="252" height="63">
                    {{--<path class="fb-button-fill"  d="M0 0 H 252 V63 H0 Z"/>--}}
                    <path class="fb-button-path"  d="M182 0 H 252 V63 H70 "/>
                    <path class="fb-button-path"  d="M70 63 H 0 V0 H182"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="fb-content">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <span >940</span>笔
                            <p>总交易量</p>
                        </div>

                        <div class="col">
                            <span  >20</span>笔
                            <p>本月交易量</p>
                        </div>

                        <div class="col">
                            <span >8</span>个
                            <p>最新模板</p>
                        </div>

                        <div class="col">
                            <span>1200</span>个
                            <p>SEO推广量</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <h2>{{$webInfo->phone}}</h2>
                    <h2>{{$webInfo->tel}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
