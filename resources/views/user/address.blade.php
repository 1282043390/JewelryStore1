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
    <form action="/User/doAddress" method="post" class="reg-login">
        @csrf
        <div class="lrBox">
            <div class="lrList">
                <input type="text" name="address_name" placeholder="收货人" />
            </div>
            <div class="lrList">
                <input type="text" name="address_detail" placeholder="详细地址" />
            </div>
            <div class="lrList select">
                <select name="province" id="province">
                    <option value="" selected>省份/直辖市</option>
                    @foreach($info as $v)
                        <option  value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="lrList select">
                <select name="city" id="city">
                        <option value="">县/区</option>
                </select>
            </div>
            <div class="lrList select">
                <select name="area" id="area">
                    <option value="">详细地址</option>
                </select>
            </div>
            <div class="lrList">
                <input type="text" name="address_tel" placeholder="手机" />
            </div>
            <div class="lrList2">
                <input type="number" name="is_default" placeholder="设为默认地址1为默认2为非默认" />
            </div>
        </div>
        <!--lrBox/-->
        <div class="lrSub">
            <input type="button" id="but" value="保存" />
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
//            layer.alert('121',{icon:1});
//            地址三级联动
            $('.select').change(function () {
                var _this =$(this).next().children('select');
                var option = '<option value="" selected="selected">请选择...</option>';
                $(this).nextAll('.select').each(function(){
                    $(this).children('select').html(option);
                });
                var id= $(this).children('select').val();
                $.get("/User/GetAddress/"+id,function(res){
                       for( var i=0; i<res.length; i++){
                        option += '<option value="'+res[i]["id"]+'">'+res[i]["name"]+'</option>';
                        }
                        _this.html(option);});
            })

//            点击保存
            $('#but').click(function(){
                var data = {};
                data.address_name = $('input[name="address_name"]').val();
                var reg =/^[\u2E80-\u9FFF]+$/ ;
                if(data.address_name == ''){
                    layer.alert('收货人不能为空',{icon:5});
                    return;
                }
                if(!(reg.test(data.address_name))){
                    layer.alert('收货人必须为中文字符',{icon:5});
                    return;
                }
                data.address_detail = $('input[name="address_detail"]').val();
                if(data.address_detail == ''){
                    layer.alert('详细地址不能为空',{icon:5});
                    return;
                }
                data.area = $('select[name="area"]').val();
                if(data.area == ''){
                    layer.alert('详细地址必选',{icon:5});
                    return;
                }
                data.province = $('select[name="province"]').val();
                if(data.province == ''){
                    layer.alert('省份必选',{icon:5});
                    return;
                }
                data.city = $('select[name="city"]').val();
                if(data.city == ''){
                    layer.alert('县/区必选',{icon:5});
                    return;
                }

                data.address_tel = $('input[name="address_tel"]').val();
                if(data.address_tel == ''){
                    layer.alert('收货人电话必填',{icon:5});
                    return;
                }
                var reg_tel = /^1[0-9]{10,19}$/;
                if(!(reg_tel.test(data.address_tel))){
                    layer.alert('收货人电话格式为11到20位数字',{icon:5});
                    return;
                }
                data.is_default = $('input[name="is_default"]').val();
                if(data.is_default == ''){
                    data.is_default = 2;
                }
                if (data.is_default !== 1){
                    data.is_default = 2;
                }
                $('input[name="is_default"]').val(data.is_default);
                $('.reg-login').submit();
            })
        });
    })
</script>
