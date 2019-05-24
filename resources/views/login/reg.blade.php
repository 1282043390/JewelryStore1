@extends('layout')
@section('title','珠宝微商城')
@section('content')

<body>
<div class="maincont">
    <header> <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>会员注册</h1>
        </div>
    </header>
    <div class="head-top">
        <img src="{{config('app.img_url')}}/head.jpg" />
    </div>
    <!--head-top/-->
    <form action="javascript:" method="post" id="form1" class="reg-login">
        <h3>已经有账号了？点此<a class="orange" href="/login/login">登陆</a></h3>
        <div class="lrBox">
            <div class="lrList">
                <input type="text" name="email" id="email" placeholder="输入手机号码或者邮箱号" /><span id="email_span"></span>
            </div>
            <div class="lrList2">
                <input type="text" name="code" id="code" placeholder="输入短信验证码" /><span id="code_span"></span>
                <button id="but">获取验证码</button>
            </div>
            <div class="lrList">
                <input type="text"  name="pwd" id="pwd" placeholder="设置新密码（6-18位数字或字母）" /><span id="pwd_span"></span>
            </div>
            <div class="lrList">
                <input type="text" name="repwd" id="repwd"  placeholder="再次输入密码" /><span id="repwd_span"></span>
            </div>
        </div>
        <!--lrBox/-->
        <div class="lrSub">
            <input type="submit" value="立即注册" />
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
            var flag = true;
//            layer.alert('酷毙了', {icon: 1});
            //判断邮箱是否符合规则
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
//            用户名
            $('#email').blur(function(){
                var email = $('#email').val();
                        {{--var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;--}}
                var email_reg = /^\w{5,10}@qq.com$/;
                var phone_reg = /^1\d{10}$/;
                if(email == ''){
                    $('#email_span').html('<font color="red">手机号或邮箱不能为空</font>');
                    return false;
                }else if(phone_reg.test(email)) {
//                    为手机号
                    $.ajax({
                        type: "POST",
                        url: "/login/CheckPhone",
                        data: {email:email},
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">手机号已存在</font>');
                            }else{
                                $('#email_span').html('<font color="green">√</font>');
                            }
                        }
                    });
                    return false;
                }else if(email_reg.test(email)){
//                    为邮箱
//                    验证唯一性
                    $.ajax({
                        type: "POST",
                        url: "/login/CheckEmail",
                        data: {email:email},
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">邮箱已存在</font>');
                            }else{
                                $('#email_span').html('<font color="green">√</font>');
                            }
                        }
                    });
                    return false;
                }
                else{
                    $('#email_span').html('<font color="red">账号格式不正确（手机号或邮箱）</font>');
                    return false;
                }
            });
//            点击获取验证码
            $('#but').click(function () {
                var email = $('#email').val();
                        {{--var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;--}}
                var email_reg = /^\w{5,10}@qq.com$/;
                var phone_reg = /^1\d{10}$/;
                if(email == ''){
                    $('#email_span').html('<font color="red">手机号或邮箱不能为空</font>');
                    return false;
                }else if(phone_reg.test(email)) {
//                    为手机号
                    $.ajax({
                        type: "POST",
                        url: "/login/CheckPhone",
                        data: {email:email},
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">手机号已存在</font>');
                            }else{
                                $.post("/login/SendPhone",{email:email},function(res){
                                    layer.alert(res.font, {icon: res.code});
                                    if(res.code == 1){

                                    }
                                },'json')
                            }
                        }
                    });
                    return false;
                }else if(email_reg.test(email)){
//                    为邮箱
//                    验证唯一性
                    $.ajax({
                        type: "POST",
                        url: "/login/CheckEmail",
                        data: {email:email},
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">手机号已存在</font>');
                            }else{
                                $.post("/login/SendEmail",{email:email},function(res){
                                    if(res.code == 1){ layer.alert(res.font, {icon: res.code});}
                                },'json');
                            }
                        }
                    });
                    return false;
                }
                else{
                    $('#email_span').html('<font color="red">账号格式不正确（手机号或邮箱）</font>');
                    return false;
                }
            });
//            验证码
            $('#code').blur(function(){
                var code = $('#code').val();
                $.post("/login/checkCode",{code:code},function(res){
                    if(res.font == code){
                        $('#code_span').html('<font color="green">√</font>');
                    }else{
                        $('#code_span').html('<font color="red">验证码错误，有效期为3分钟</font>');
                        return false;
                    }
                },'json')
            })
//            密码
            $('#pwd').blur(function(){
               var pwd = $('#pwd').val();
                var reg = /^[a-zA-Z0-9]{4,6}$/;
                if(pwd == ''){
                    $('#pwd_span').html('<font color="red">密码不能为空</font>');
                    return false;
                }else if(!reg.test(pwd)) {
//                    密码格式不正确
                    $('#pwd_span').html('<font color="red">密码格式不正确</font>');
                    return false;
                }else{
                    $('#pwd_span').html('<font color="green">√</font>');
                }
            });
//            确认密码
            $('#repwd').blur(function(){
                var repwd = $('#repwd').val();
                var pwd = $('#pwd').val();
                console.log(repwd);
                console.log(pwd);
                if(repwd == ''){
                    $('#repwd_span').html('<font color="red">确认密码不能为空</font>');
                    return false;
                }else if(!(repwd  == pwd)) {
//                    密码格式不正确
                    $('#repwd_span').html('<font color="red">密码格式不正确</font>');
                    return false;
                }else{
                    $('#repwd_span').html('<font color="green">√</font>');
                }
            })
//            点击提交
            $('input:submit').click(function(){
//        验证用户
                var email = $('#email').val();
                        {{--var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;--}}
                var email_reg = /^\w{5,10}@qq.com$/;
                var phone_reg = /^1\d{10}$/;
                if(email == ''){
                    $('#email_span').html('<font color="red">手机号或邮箱不能为空</font>');
                    return false;
                }else if(phone_reg.test(email)) {
//                    为手机号
                    $.ajax({
                        type: "POST",
                        url: "/login/CheckPhone",
                        data: {email:email},
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">手机号已存在</font>');
                                flag = false;
                            }else{
                                $('#email_span').html('<font color="green">√</font>');
                                flag = true;
                            }
                        }
                    });
                }else if(email_reg.test(email)){
//                    为邮箱
//                    验证唯一性


                    $.ajax({
                        type: "POST",
                        url: "/login/CheckEmail",
                        data: {email:email},
                        async:false,
                        success: function(msg){
                            if(msg >0){
                                $('#email_span').html('<font color="red">邮箱已存在</font>');
                                flag = false;
                            }else{
                                $('#email_span').html('<font color="green">√</font>');
                                flag = true;
                            }
                        }
                    });
                }
                else{
                    $('#email_span').html('<font color="red">账号格式不正确（手机号或邮箱）</font>');
                    return false;
                }

//  验证验证码

                var code = $('#code').val();
                if(code == ''){
                    $('#code_span').html('<font color="red">验证码不能为空</font>');
                    return false;
                }



//    验证密码
                var pwd = $('#pwd').val();
                var reg = /^[a-zA-Z0-9]{4,6}$/;
                if(pwd == ''){
                    $('#pwd_span').html('<font color="red">密码不能为空</font>');
                    return false;
                }else if(!reg.test(pwd)) {
//                    密码格式不正确
                    $('#pwd_span').html('<font color="red">密码格式不正确</font>');
                    return false;
                }else{
                    $('#pwd_span').html('<font color="green">√</font>');
                }

//     验证确认密码
                var repwd = $('#repwd').val();
                var pwd = $('#pwd').val();
                if(repwd == ''){
                    $('#repwd_span').html('<font color="red">确认密码不能为空</font>');
                    return false;
                }else if(!(repwd  == pwd)) {
    //                    密码格式不正确
                    $('#repwd_span').html('<font color="red">密码格式不正确</font>');
                    return false;
                }else{
                    $('#repwd_span').html('<font color="green"></font>');
                }


                if (!flag){
                    return false;
                }
//                注册
                var data = {};
                data.email = $('#email').val();
                data.code = $('#code').val();
                data.password = $('#pwd').val();
                data.repwd = $('#repwd').val();
                $.ajax({
                    type: "POST",
                    url: "/login/DoReg",
                    data: data,
                    dataType:'json',
                    success: function(msg){
                        layer.alert(msg.font, {icon: msg.code});
                        if (msg.code == 1){
                            window.location.href='/login/login';
                        }
                    }
                });
            })


        });
    })
</script>