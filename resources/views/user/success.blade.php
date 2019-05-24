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
    <header>
        <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>购物车</h1>
        </div>
    </header>
    <div class="susstext">订单提交成功</div>
    <div class="sussimg">&nbsp;</div>
    <div class="dingdanlist">
        <table>
            <tr>
                <td width="50%">
                    <h3>订单号：{{$arr->order_no}}</h3>
                    <time>创建日期：{{$arr->created_at}}<br />
                        失效日期：{{$arr->due_at}}</time>
                    <strong class="orange">¥{{$arr->order_amount}}</strong>
                </td>
                <td align="right"><span class="orange">@if($arr->order_status == 2)等待支付@else 已支付@endif</span></td>
            </tr>
        </table>
    </div><!--dingdanlist/-->
    <div class="succTi orange">请您尽快完成付款，否则订单将被取消</div>

</div><!--content/-->

<div class="height1"></div>
<div class="gwcpiao">
    <table>
        <tr>
            <td width="50%"><a href="/Prolist/index" class="jiesuan" style="background:#5ea626;">继续购物</a></td>
            @if($arr->pay_type == '网上支付')
                <td width="50%"><a href="/Pay/pagepayPc" class="jiesuan">立即支付</a></td>
            @else
                <td width="50%"><a href="success.html" class="jiesuan">立即支付</a></td>
            @endif
        </tr>
    </table>
</div><!--gwcpiao/-->
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
    $('.spinnerExample').spinner({});
</script>
</body>
</html>