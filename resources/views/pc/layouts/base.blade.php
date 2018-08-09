<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('scss/global.css')}}">
    <link rel="stylesheet" href="{{url('scss/foot.css')}}">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_772977_y9gnyc3io8.css">
    <title>@yield('title'){{$webInfo->seo_name}}</title>
    <meta name="keywords" content="{{$webInfo->seo_keywords}}">
    <meta name="keywords" content="{{$webInfo->seo_info}}">
    @yield('csss')
</head>
<body>

@include('pc.layouts.head')
@yield('content')
@include('pc.layouts.foot')




<!-- Optional JavaScript -->
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.dowebok.com/134/js/scrollReveal.js"></script>
<script src="{{url('js/global.js')}}"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    window.scrollReveal = new scrollReveal({reset: false});
</script>
@yield('jss')
</body>
</html>