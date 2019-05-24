@extends('layout')
        @section('title','珠宝微商城')
        @section('content') @php $index=1; @endphp
            <body>
        <div class="maincont">
            <div class="head-top">
                <img src="{{config('app.img_url')}}/head.jpg" />
                <dl> <dt><a href="user.html"><img src="{{config('app.img_url')}}/touxiang.jpg" /></a></dt>
                    <dd>
                        <h1 class="username">三级分销终身荣誉会员</h1>
                        <ul>
                            <li><a href="/Prolist/index"><strong>34</strong><p>全部商品</p></a>
                            </li>
                            <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a>
                            </li>
                            <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </dd>
                    <div class="clearfix"></div>
                </dl>
            </div>
            <!--head-top/-->
            <form action="#" method="get" class="search">
                <input type="text" class="seaText fl" />
                <input type="submit" value="搜索" class="seaSub fr" />
            </form>
            <!--search/-->
            <ul class="reg-login-click">
                <li><a href="/login/login">登录</a>
                </li>
                <li><a href="/login/reg" class="rlbg">注册</a>
                </li>
                <div class="clearfix"></div>
            </ul>
            <!--reg-login-click/-->
            <div id="sliderA" class="slider">
                @foreach($newInfo as $v)
                <img src="{{config('app.img_url')}}/{{$v->goods_img}}" />
                @endforeach
            </div>
            <!--sliderA/-->
            <ul class="pronav">
                @foreach($bestInfo as $v)
                <li><a href="/Prolist/proinfo/{{$v->goods_id}}">{{$v->goods_name}}</a>
                </li>
                @endforeach
                <div class="clearfix"></div>
            </ul>
            <!--pronav/-->
            <div class="index-pro1">
                @foreach ($hotInfo as $k=>$v)
                <div class="index-pro1-list">
                    <dl> <dt><a href="/Prolist/proinfo/{{$v->goods_id}}"><img src="{{config('app.img_url')}}/{{$v->goods_img}}" /></a></dt>
                        <dd class="ip-text"><a href="/Prolist/proinfo/{{$v->goods_id}}">{{$v->goods_name}}</a><span>已售：855</span>
                        </dd>
                        <dd class="ip-price"><strong>¥299</strong>  <span>¥{{$v->goods_price}}</span>
                        </dd>
                    </dl>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <!--index-pro1/-->
            <div class="prolist">
                @foreach($bestInfo as $v)
                <dl> <dt><a href="/Prolist/proinfo/{{$v->goods_id}}"><img src="{{config('app.img_url')}}/{{$v->goods_img}}" width="100" height="100" /></a></dt>
                    <dd>
                        <h3><a href="/Prolist/proinfo/{{$v->goods_id}}">{{$v->goods_name}}</a></h3>
                        <div class="prolist-price"><strong>¥299</strong>  <span>¥{{$v->goods_price}}</span>
                        </div>
                        <div class="prolist-yishou"><span>5.0折</span>  <em>已售：35</em>
                        </div>
                    </dd>
                    <div class="clearfix"></div>
                </dl>
                @endforeach
            </div>
            <!--prolist/-->
            <div class="joins">
                <a href="fenxiao.html">
                    <img src="{{config('app.img_url')}}/jrwm.jpg" />
                </a>
            </div>
            <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span>
            </div>
            <div class="height1"></div>
@endsection
