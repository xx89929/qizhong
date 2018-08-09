@extends('pc.layouts.base')


@section('content')
    <div class="container">
        <div class="contact-warp">
            <div class="contact-title">
                <h1 class="text-center">海南企众</h1>
            </div>
            <div class="contact-about contact-item">
                <p>{!! $webInfo->about_us !!}</p>
            </div>

            <div class="contact-title">
                <h1 class="text-center">尽情来骚扰我们吧</h1>
            </div>
            <div class="contact-item">
                <div class="row">
                    <div class="col-4">
                        <p>热线客服：0898-66766640</p>
                        <p>联系电话：133-3755-0507</p>
                    </div>
                    <div class="col-4">
                        <p>QQ资讯   ：543060074</p>
                        <p>微信公众号：海南企众</p>
                    </div>

                    <div class="col-4">
                        <p>地址：海南省海口市龙华区国贸路 华昌大厦601
                        </p>
                    </div>
                </div>

            </div>

            <div class="contact-title">
                <h1 class="text-center">我们在这里等待您的到来</h1>
            </div>

            <div class="contact-item">
                <div style="width:1140px;height:400px;border:#ccc solid 1px;" id="dituContent"></div>
            </div>
        </div>

    </div>

    @include('pc.layouts.footBanner')
@endsection

@section('csss')
    <link rel="stylesheet" href="{{asset('scss/contact.css')}}">
@endsection


@section('jss')
    @parent
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <script type="text/javascript">
        //创建和初始化地图函数：
        function initMap(){
            createMap();//创建地图
            setMapEvent();//设置地图事件
            addMapControl();//向地图添加控件
            addMarker();//向地图中添加marker
        }

        //创建地图函数：
        function createMap(){
            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
            var point = new BMap.Point(110.342747,20.036164);//定义一个中心点坐标
            map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
        }

        //地图事件设置函数：
        function setMapEvent(){
            map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
            map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
            map.enableKeyboard();//启用键盘上下左右键移动地图
        }

        //地图控件添加函数：
        function addMapControl(){
        }

        //标注点数组
        var markerArr = [{title:"海南企众实业有限公司",content:"地址：海南省海口市龙华区国贸路&nbsp;华昌大厦601<br/><br/>介绍：海南企众实业有限公司是一家专注于企业网站建设，推广，微信开发的专业技术型公司，公司有资深技术开发团队，专注于为中小企业提供性价比高的建站服务及技术支持，所做的网站以价格低，效果好而著称，积累客户案例上万家，遍布全国各地，赢得了良好的口碑。",point:"110.322912|20.029643",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
        ];
        //创建marker
        function addMarker(){
            for(var i=0;i<markerArr.length;i++){
                var json = markerArr[i];
                var p0 = json.point.split("|")[0];
                var p1 = json.point.split("|")[1];
                var point = new BMap.Point(p0,p1);
                var iconImg = createIcon(json.icon);
                var marker = new BMap.Marker(point,{icon:iconImg});
                var iw = createInfoWindow(i);
                var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
                marker.setLabel(label);
                map.addOverlay(marker);
                label.setStyle({
                    borderColor:"#808080",
                    color:"#333",
                    cursor:"pointer"
                });

                (function(){
                    var index = i;
                    var _iw = createInfoWindow(i);
                    var _marker = marker;
                    _marker.addEventListener("click",function(){
                        this.openInfoWindow(_iw);
                    });
                    _iw.addEventListener("open",function(){
                        _marker.getLabel().hide();
                    })
                    _iw.addEventListener("close",function(){
                        _marker.getLabel().show();
                    })
                    label.addEventListener("click",function(){
                        _marker.openInfoWindow(_iw);
                    })
                    if(!!json.isOpen){
                        label.hide();
                        _marker.openInfoWindow(_iw);
                    }
                })()
            }
        }
        //创建InfoWindow
        function createInfoWindow(i){
            var json = markerArr[i];
            var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
            return iw;
        }
        //创建一个Icon
        function createIcon(json){
            var icon = new BMap.Icon("http://map.baidu.com/image/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
            return icon;
        }

        initMap();//创建和初始化地图
    </script>
@endsection