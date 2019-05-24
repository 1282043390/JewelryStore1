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
    <table class="shoucangtab">
        <tr>
            <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span>
            </td>
            <td width="25%" align="center" style="background:#fff url({{config('app.img_url')}}/xian.jpg) left center no-repeat;"> <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
            </td>
        </tr>
    </table>
    <div class="dingdanlist">
        <table>
            <tr>
                <td width="100%" colspan="4">
                    <a href="javascript:;">
                        <input type="checkbox" name="3" />全选</a>
                </td>
            </tr>
        </table>
    </div>
    <!--dingdanlist/-->
    <div class="dingdanlist">
        <table>

            @foreach($data as $v)
            <tr name="tr" goods_id="{{$v->goods_id}}">
                <td width="4%">
                    <input type="checkbox" name="2" class="MunyCheck" goods_id="{{$v->goods_id}}" cate_id ='{{$v->cate_id}}' />
                </td>
                <td class="dingimg" width="15%">
                    <img src="{{config('app.img_url')}}/{{$v->goods_thumb}}" />
                </td>
                <td width="50%">
                    <h3>{{$v->goods_name}}</h3>
                    <time>添加时间：{{$v->created_at}}</time>
                </td>
                <td align="right">
                    <input type="hidden" name="goods_number" value="{{$v->goods_number}}">
                    <input type="text" class="spinnerExample" />
                    <input type="hidden" class="buy_number" value="{{$v->buy_number}}">
                </td>
            </tr>
            <tr>
                <th colspan="4"><strong class="orange" >¥{{$v->shop_price}}</strong>
                </th>
            </tr>
            @endforeach
            <tr>
                <td width="100%" colspan="4">
                    <a href="javascript:;">
                        <input type="button" name="1" id="but" value=删除 /></a>
                </td>
            </tr>
        </table>
    </div>
    <!--dingdanlist/-->
    <div class="height1"></div>
    <div class="gwcpiao">
        <table>
            <tr>
                <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a>
                </th>
                <td width="50%">总计：<strong  id="count" class="orange">¥0</strong>
                </td>
                <td width="40%"><a href="javascript:" id="pay" class="jiesuan">去结算</a>
                </td>
            </tr>
        </table>
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
    $(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('.spinnerExample').spinner({ });
//            购买数量
            var buy_number_db =  $('.buy_number');
            buy_number_db.each(function(){
                var buy_number1 =  $(this).val();
                $(this).prev().children().eq(1).val(buy_number1);
            });

            //点击+号
            $('.increase').click(function(){
                var _this = $(this);
                var goods_id = $(this).parents('tr[name="tr"]').attr('goods_id');
                //库存input框
                var goods_num = _this.parent().prev();
                //购买数量input框
                var buy_num = _this.prev();
                //购买数量
                var buy_number = parseInt(buy_num.val());
                //库存
                var goods_number = parseInt(goods_num.val());
                if(buy_number>=goods_number){
                    buy_num.val(goods_number);
                }else{
                    buy_num.val(buy_number);
                }
                $.post("/Car/SaveBuyNumber",{goods_id:goods_id,buy_number:buy_number});
                //选中多选框
                $(this).parents('tr').find('input[name="2"]').prop('checked',true);
                //计算总价
                getCount();
            });

            //点击-号
            $('.decrease').click(function(){
                var _this = $(this);
                var goods_id = $(this).parents('tr[name="tr"]').attr('goods_id');
                var buy_num = _this.next();
                var buy_number = parseInt(buy_num.val());
                if(buy_number<=1){
                    buy_num.val(1);
                }else{
                    buy_num.val(buy_number);
                }
                $(this).parents('tr').find('input[name="2"]').prop('checked',true);
                $.post("/Car/SaveBuyNumber",{goods_id:goods_id,buy_number:buy_number});
                getCount();

            });

            //失去焦点
            $('.spinnerExample').blur(function(){
                var _this = $(this);
                var goods_id = $(this).parents('tr[name="tr"]').attr('goods_id');
                var goods_num = _this.parent().prev();
                var buy_num = _this;
                var buy_number = parseInt(buy_num.val());
                var goods_number = parseInt(goods_num.val());
                var reg=/^\d+$/;

                if(buy_number==''||buy_number<=1||!reg.test(buy_number)){
                    _this.val(1);
                }else if(buy_number>=goods_number){
                    _this.val(goods_number);
                }else{
                    buy_number=parseInt(buy_number);
                    _this.val(buy_number);
                }
                $(this).parents('tr').find('input[name="2"]').prop('checked',true);
                $.post("/Car/SaveBuyNumber",{goods_id:goods_id,buy_number:buy_number});
                getCount();
            });
//            点击删除
            $('#but').click(function (){
                var checked = $('input[name="2"]:checked');
                checked.each(function () {
                    var goods_id = $(this).parents('tr[name="tr"]').attr('goods_id');
                    $.post("/Car/RemoveGoodsId/"+goods_id);
                    $(this).parents('tr[name="tr"]').next().remove();
                    $(this).parents('tr[name="tr"]').remove();

                })
            })
//            点击单选框
            $('input[name="2"]').click(function(){
                getCount();
            })
//            点击全选
            $('input[name="3"]').click(function(){
                $('input[name="2"]').prop('checked',$(this).prop('checked'));
                getCount();
            });
//            结算
            $('#pay').click(function(){
                var checked = $('input[name="2"]:checked');
                if (checked.length <1){
                    alert('至少选中一项才可以结算');
                    return;
                }
                var cate_id='';
                checked.each(function(){
                    cate_id += $(this).attr('cate_id')+',';
                });
                location.href='/Car/Pay/'+cate_id;
            })
            //计算总价
            function getCount() {
                //获取选中的复选框的id
                var goods_id = new Array();
                $('input[name="2"]:checked').each(function (index) {
                    goods_id.push($(this).attr('goods_id'));
                });
                $.post("/Car/getCount",{goods_id:goods_id},function(res){ $('#count').text('￥'+res);});
            }
        });
    })
</script>
</body>

</html>