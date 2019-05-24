<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>购物车</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond./js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="maincont">
    <header> <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>购物车</h1>
        </div>
    </header>
    <div class="head-top">
        <img src="{{config('app.img_url')}}/head.jpg" />
    </div>
    <!--head-top/-->
    <div class="dingdanlist" >
        <table>
            @if(empty($ressInFo))
            <tr onclick="window.location.href='/User/address'">
                <td class="dingimg" width="75%" colspan="2">新增收货地址</td>
                <td align="right">
                    <img src="{{config('app.img_url')}}/jian-new.png" />
                </td>
            </tr>
            @else
                <tr onclick="window.location.href='/User/RessList'">
                    <td class="dingimg" width="75%" colspan="2">{{$ressInFo->address_name}}{{$ressInFo->address_tel}}</td>
                    <td align="right">
                        <img src="{{config('app.img_url')}}/jian-new.png" />
                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="3" style="height:10px; background:#efefef;padding:0;"></td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">选择收货时间</td>
                <td align="right">
                    <img src="{{config('app.img_url')}}/jian-new.png" />
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height:10px; background:#efefef;padding:0;"></td>
            </tr>
            <tr>
                <td class="dingimg"  width="75%" colspan="2">支付方式</td>
                <td align="right"><span id="pay_type" class="hui">网上支付</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height:10px; background:#efefef;padding:0;"></td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">优惠券</td>
                <td align="right"><span class="hui">无</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height:10px; background:#efefef;padding:0;"></td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">是否需要开发票</td>
                <td align="right"><a href="javascript:;" class="orange">是</a> &nbsp; <a href="javascript:;">否</a>
                </td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">发票抬头</td>
                <td align="right"><span class="hui">个人</span>
                </td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">发票内容</td>
                <td align="right"><a href="javascript:;" class="hui">请选择发票内容</a>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height:10px; background:#fff;padding:0;"></td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="3">商品清单</td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td class="dingimg" width="15%">
                    <img src="{{config('app.img_url')}}/{{$v->goods_thumb}}" />
                </td>
                <td width="50%">
                    <h3>{{$v->goods_name}}</h3>
                    <time>下单时间：{{$v->created_at}}</time>
                </td>
                <td align="right"><span class="qingdan">X {{$v->buy_number}}</span>
                </td>
            </tr>
            <tr>
                <th colspan="3"><strong class="orange">¥{{$v->shop_price}}</strong>
                </th>
            </tr>
            @endforeach
            <tr>
                <td class="dingimg" width="75%" colspan="2">商品金额</td>
                <td align="right"><strong class="orange">¥{{$count}}</strong>
                </td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">折扣优惠</td>
                <td align="right"><strong class="green">¥0.00</strong>
                </td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">抵扣金额</td>
                <td align="right"><strong class="green">¥0.00</strong>
                </td>
            </tr>
            <tr>
                <td class="dingimg" width="75%" colspan="2">运费</td>
                <td align="right"><strong class="orange">¥20.80</strong>
                </td>
            </tr>
        </table>
    </div>
    <!--dingdanlist/-->
</div>
<!--content/-->
<div class="height1"></div>
<div class="gwcpiao">
    <form action="/User/success" id="form">
        <table>
            <tr>
                <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a>
                </th>
                <td width="50%">总计：<strong class="orange">¥{{$count}}</strong>
                </td>
                <input type="hidden" name="cate_id" value="{{$cate_id}}">
                <input type="hidden" name="count" value="{{$count}}">
                <td width="40%"><a href="javascript:" class="jiesuan">提交订单</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<!--gwcpiao/-->
</div>
<!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/style.js"></script>
<!--jq加减-->
<script src="/js/jquery.spinner.js"></script>
<script src="/js/layui.all.js"></script>
<script>
    $(function(){
        $('.spinnerExample').spinner({});

        $('a[class="jiesuan"]').click(function(){
            var pay_type = $('#pay_type').text();
            var hidden = "<input type='hidden' name='pay_type' value="+pay_type+">";
            $('#form').prepend(hidden);
            $('#form').submit();
        })
    })


</script>
</body>

</html>