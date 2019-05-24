@extends('layout')
@section('title','珠宝微商城')
@section('content') @php $user=1; @endphp

<body>
<div class="maincont">
    <header> <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>收货地址</h1>
        </div>
    </header>
    <div class="head-top">
        <img src="{{config('app.img_url')}}/head.jpg" />
    </div>
    <!--head-top/-->
    <table class="shoucangtab">
        <tr>
            <td width="75%"><a href="/User/address" class="hui"><strong class="">+</strong> 新增收货地址</a>
            </td>
            <td width="25%" align="center" style="background:#fff url({{config('app.img_url')}}/xian.jpg) left center no-repeat;"><a href="javascript:;" class="orange">删除信息</a>
            </td>
        </tr>
    </table>
    @foreach($data as $v)
    <div class="dingdanlist" onClick="window.location.href='proinfo.html'">
        <table>
            <tr>
                <td width="50%">
                    <h3>{{$v->address_name}} {{$v->address_tel}}</h3>
                    <time>{{$v->province}}{{$v->city}}{{$v->area}}{{$v->address_detail}}</time>
                </td>
                <td align="right"><a href="address.html" class="hui"><span class="glyphicon glyphicon-check"></span> 修改信息</a>
                </td>
            </tr>
        </table>
    </div>
    @endforeach
    <!--dingdanlist/-->
    <div class="height1"></div>
    @endsection
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/layui.all.js"></script>