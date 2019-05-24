<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>商品详情</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</head>

<body>
<div class="maincont">
    <header> <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>产品详情</h1>
        </div>
    </header>
    <div id="sliderA" class="slider">
        <img src="{{config('app.img_url')}}/{{$data->goods_img}}" />
        {{--<img src="{{config('app.img_url')}}/image2.jpg" />--}}
        {{--<img src="{{config('app.img_url')}}/image3.jpg" />--}}
        {{--<img src="{{config('app.img_url')}}/image4.jpg" />--}}
        {{--<img src="{{config('app.img_url')}}/image5.jpg" />--}}
    </div>
    <!--sliderA/-->
    <table class="jia-len">
        <tr>
            <th><strong class="orange">￥{{$data->shop_price}}</strong>
            </th>
            <td>
                <input type="number" id="buy_number" class="spinnerExample" />
                <span id="buy_span">@php echo $error??''@endphp </span>
            </td>
        </tr>
        <tr>
            <td> <strong>{{$data->shop_name}}</strong>
                <p class="hui">富含纤维素，平衡每日膳食</p>
            </td>
            <td align="right"> <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
            </td>
        </tr>
    </table>
    <div class="height2"></div>
    <h3 class="proTitle">商品规格</h3>
    <ul class="guige">
        <li class="guigeCur"><a href="javascript:;">50ML</a>
        </li>
        <li><a href="javascript:;">100ML</a>
        </li>
        <li><a href="javascript:;">150ML</a>
        </li>
        <li><a href="javascript:;">200ML</a>
        </li>
        <li><a href="javascript:;">300ML</a>
        </li>
        <div class="clearfix"></div>
    </ul>
    <!--guige/-->
    <div class="height2"></div>
    <div class="zhaieq"> <a href="javascript:;" class="zhaiCur">商品简介</a>
        <a href="javascript:;">商品参数</a>
        <a href="javascript:;" style="background:none;">订购列表</a>
        <div class="clearfix"></div>
    </div>
    <!--zhaieq/-->
    <div class="proinfoList">
        <img src="{{config('app.img_url')}}/image4.jpg" width="636" height="822" />
    </div>
    <!--proinfoList/-->
    <div class="proinfoList">1q2qweqwewqeqweqwewq....</div>
    <!--proinfoList/-->
    <div class="proinfoList">暂无信息......</div>
    <!--proinfoList/-->
    <table  bgcolor="#ffebcd"  width="650" >
        <tr>
            <td>用户评论</td>
            <td align="right">（共{{$count}}条评论）</td>
        </tr>
    </table>
    <div id="commentList">
        @foreach ($commentList as $k=>$v)
        <table  bgcolor="#ffebcd"  width="650" height="90">
            <tr>
                <td>
                    {{$v->E_email}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td align="left">{{$v->c_level}}星</td>
            </tr>
            <tr>
                <td></td>
                <td align="right">{{$v->created_at}}</td>
            </tr>
        </table>
        @endforeach
            {{ $commentList->links() }}
    </div>
    <table border="8" bgcolor="#ffebcd"  width="800" height="200">
        <tr>
            <td>用户名:</td>
            <td id="c_name">匿名户名</td>
        </tr>
        <tr>
            <td>E-email:</td>
            <td><input type="text" name="E_email" id="E_email"></td>
        </tr>
        <tr>
            <td>评论等级</td>
            <td>
                <input type='radio' name="c_level" class="c_level" value="1" checked="checked"> 1级 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type='radio' name="c_level" class="c_level" value="2" > 2级 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type='radio' name="c_level" class="c_level" value="3" > 3级 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type='radio' name="c_level" class="c_level" value="4" > 4级 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type='radio' name="c_level" class="c_level" value="5" > 5级 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td>评论内容</td>
            <td>
                <textarea name="c_content" id="c_content" cols="79" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" id="button" value="提交评论">
            </td>
        </tr>
    </table>
    <table class="jrgwc">
        <tr>
            <th> <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
            </th>
            <td><a href="javascript:" id="GoShop">加入购物车</a>
            </td>
        </tr>

    </table>
</div>
<script src="{{asset('js/jquery-3.3.1.js')}}" ></script>
<script src="/js/layui.all.js"></script>
<script>
    $(function() {
            layui.use('layer', function(){
                var layer = layui.layer
//                layer.alert('酷毙了', {icon: 1});
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#GoShop').click(function(){
                    var buy_number = $('#buy_number').val();
                    if(buy_number == ''){
                        $('#buy_span').html('<font color="#ff1d3d ">购买数量为必填项</font>');
                        return;
                    }else if(buy_number < 0){
                        $('#buy_number').val(1);
                        $('#buy_span').html('<font color="#ff1d3d "></font>');
                        return;
                    }else{
                        $('#buy_span').html('<font color="#ff1d3d "></font>');
                    }
                    window.location.href='/Car/GoShop/{{$data->goods_id}}/'+buy_number;
                })



//                添加评论
                $('#button').click(function(){
                    var data = {};
                    data.c_name = $('#c_name').text();
                    data.E_email = $('#E_email').val();
                    data.c_level = $('.c_level:checked').val();
                    data.c_content = $('#c_content').val();
                    data.goods_id = {{$id}};
                    var page = $('.active').text();

                    $.ajax({
                        type: "post",
                        url: "/Prolist/addComment",
                        data:data,
                        dataType: "html",
                        success:function(res){
                            alert('添加成功');
                            if(page == 1){
                                alert(1);
                                $('#commentList').prepend(res);
                                $('#commentList').children().last().prev().remove();
                            }

                        }
                    });
                })

//                ajax分页
                $(document).on('click','.page-link',function(){
                    var url = $(this).attr('href');
                    $.get(url, function(data){
                        $('#commentList').html(data);
                    });
                   return false;
                })
            });
    });
</script>

</body>

</html>