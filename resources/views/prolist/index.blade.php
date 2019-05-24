@extends('layout')
@section('title','珠宝微商城')
@section('content')  @php $plist=1; @endphp
<body>
<div class="maincont">
    <header>
        <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <form action="#" method="get" class="prosearch"><input type="text" /></form>
        </div>
    </header>
    <ul class="pro-select">
        <li class="pro-selCur"><a href="javascript:;">全部</a></li>
        <li ><a href="javascript:;" id="go_number">销量</a></li>
        <li><a href="javascript:;"  id="shop_price">价格</a></li>
    </ul><!--pro-select/-->
    <div class="prolist">
        @php $error='' @endphp
        @foreach($data as $v)
        <dl>
            <dt><a href="/Prolist/proinfo/{{$v->goods_id}}"><img src="{{config('app.img_url')}}/{{$v->goods_img}}" width="100" height="100" /></a></dt>
            <dd>
                <h3><a href="/Prolist/proinfo/{{$v->goods_id}}">{{$v->goods_name}}</a></h3>
                <div class="prolist-price"><strong>¥{{$v->market_price}}</strong> <span>¥{{$v->goods_price}}</span></div>
                <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->go_number}}</em></div>
            </dd>
            <div class="clearfix"></div>
        </dl>
        @endforeach
    </div><!--prolist/-->
    <div class="height1"></div>

@endsection
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/layui.all.js"></script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        销量
        $('#go_number').click(function(){
            var _this = $(this).parent('li');
            _this.addClass('pro-selCur');
            _this.siblings('li').removeClass('pro-selCur');
            $.post("/Prolist/GoNumber", function(data){
                $('.prolist').html(data);
            },'html');
        });
//        价格
        $('#shop_price').click(function(){
            var _this = $(this).parent('li');
            _this.addClass('pro-selCur');
            _this.siblings('li').removeClass('pro-selCur');
            $.post("/Prolist/ShopPrice", function(data){
                $('.prolist').html(data);
            },'html');
        })

    })
</script>
