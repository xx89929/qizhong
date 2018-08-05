@section('csss')
    @parent
    <link rel="stylesheet" href="{{url('scss/banner.css')}}">
@endsection
<section>
    <div class="banner-warp">
        <div class="banner-index">
            <ul class="banList list-unstyled">
                @foreach($banners as $banner)
                <li @if($loop->first) class="active" @endif><a href="#"><img src="{{$disksPath.$banner->img_path}}" alt="{{$banner->banner_title}}"></a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</section>

@section('jss')
    @parent
    <script src="{{url('js/jquery.banner.js')}}"></script>
    <script>
        $(function(){
            $(".banner-index").swBanner();
        });
    </script>
@endsection