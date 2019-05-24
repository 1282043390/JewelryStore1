<?php

namespace App\Http\Controllers\index;
use App\model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Area;
use App\model\Address;
use App\model\Cart;
use App\model\Order;

class UserController extends Controller
{
    /*
     * 首页
     */
    public function index(){
        $id =GetId();
        if (empty($id)){
            return redirect('/login/login');
        }
        $user_model = new User;
        $data = $user_model ->where('id','=',$id)->first();
        return view('user/index',['data'=>$data]);
    }

    /*
     * 收货地址管理
     */
    public function address(){
        $area_mdoel = new Area;
        $areaInfo = $area_mdoel->all();
        $info = GetAddress($areaInfo);
        return view('user/address',['info'=>$info]);
    }

    /*
     * ajax获取收货地址
     */
    public function GetAddress($id){
        $area_mdoel = new Area;
        $areaInfo = $area_mdoel->all();
        $info = GetAddress($areaInfo,$id);
        return $info;
    }


    /*
     * 购物车列表
     */
    public function RessList(){
        $address_model = new Address;
        $where = [
            ['user_id','=',GetId()],
            ['is_del','=',1],
        ];
        $data = $address_model->where($where)->get();
        return view('User/resslist',['data'=>$data]);
    }

    /*
     * 执行键入购物车
     */
    public function doAddress(Request $request){
        $post = $request->except(['_token']);
        $post['user_id'] = GetId();
        $address_model = new Address;
        foreach($post as $k=>$v){
            $address_model-> $k = $v;
        }
        $res = $address_model->save();
        return redirect('/User/RessList');
    }

//    提交点单
    public function success(Request $request){
        $post = $request->all();
        $post['order_amount'] = $post['count'];
        $post['order_no'] = getOrderOn();
        $post['order_talk'] = '';
        $post['pay_status'] = 2;
        $post['created_at'] = date('Y-m-d H:i:s',time());
        $post['updated_at'] = date('Y-m-d H:i:s',time());
        $post['due_at'] = date('Y-m-d H:i:s',time()+60*60*2);


        $post['user_id'] = GetId();
        $cate_id = explode(',',$post['cate_id']);
        $cate_model = new Cart;
//        商品总价
        $info = $cate_model->join('goods','cart.goods_id','=','goods.goods_id')->select('buy_number','shop_price')->whereIn('cart.cate_id',$cate_id)->get();
        $count=0;
        foreach($info as $k=>$v){
            $count+= $v->shop_price*$v->buy_number;
        }

//        添加订单表\
        unset($post['cate_id']);
        unset($post['count']);
        $order_model = new Order;
        $order_id = $order_model->insertGetId($post);
        $arr = $order_model->where('order_id','=',$order_id)->first();
        return view('user/success',['arr'=>$arr]);
    }
}
