@extends('layout')
@section('title','珠宝微商城')
@section('content')
<body>
<div class="maincont">
    <header> <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>会员登录</h1>
        </div>
    </header>
    <div class="head-top">
        <img src="{{config('app.img_url')}}/head.jpg" />
    </div>
    <!--head-top/-->
    <form action="javascript:" method="post" class="reg-login">
        <h3>还没有三级分销账号？点此<a class="orange" href="/login/reg">注册</a></h3>
        <div class="lrBox">
            <div class="lrList">
                <input type="text" id="email" name="email" placeholder="输入手机号码或者邮箱号" /><span id='email_span' ></span>
            </div>
            <div class="lrList">
                <input type="text"  id="password"  name="password" placeholder="输入证码" /><span id='password_span' ></span>
            </div>
        </div>
        <!--lrBox/-->
        <div class="lrSub">
            <input type="submit" value="立即登录" />
        </div>
    </form>
    <!--reg-login/-->
    <div class="height1"></div>
@endsection
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/layui.all.js"></script>
<script>
    $(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
//            layer.alert('酷毙了', {icon: 1});
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('input:submit').click(function (){
                var email = $('#email').val();
                var password = $('#password').val();
                if(email == ''){
                    $('#email_span').html('<font color="red">手机号或邮箱不能为空</font>');
                    return;
                }
                if(password == ''){
                    $('#password_span').html('<font color="red">密码不能为空</font>');
                    return;
                }
                var data = {};
                data.email = email;
                data.password = password;
                $.ajax({
                    type: "POST",
                    url: "/login/register",
                    data: data,
                    dataType:'json',
                    success: function(msg){
                        layer.alert(msg.font, {icon: msg.code});
                        if (msg.code == 1){
                            window.location.href='/User/index';
                        }
                    }
                });
            })

        });
    })
</script>