<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Cart;
use App\model\Goods;
use App\model\Address;

class CarController extends Controller
{
    public function index(){
        $user_id = GetId();

        $cart_model = new Cart;
        $where = [
            ['user_id','=',$user_id],
            ['is_del','=',1],
        ];
//        购物车总数
        $count = $cart_model->where($where)->count();
//        购物车商品
        $where = [
            ['user_id','=',$user_id],
            ['is_del','=',1],
        ];
        $data = $cart_model
                ->join('goods', 'goods.goods_id', '=', 'cart.goods_id')
                ->where($where)
                ->get();
        return view('car/index',compact('count','data'));
    }

    /*
     * 执行加入购物车
     */
    public function GoShop($goods_id,$buy_number){
        $goods_model = new Goods;
        $error = checkBuyNum($goods_model,$goods_id,$buy_number);
        if (!($error == '')){
            return redirect("Prolist/proinfo/$goods_id/$error");
        }
        $id =GetId();
        if (empty($id)){
            return redirect('/login/login');
        }
        $cate_model = new Cart;
        $where = [
            ['user_id','=',$id],
            ['goods_id','=',$goods_id],
        ];
        $count = $cate_model->where($where)->count();
        if ($count > 0){
            //修改
            $res = $cate_model->where($where)->update(['is_del'=>1]);
            $id = $cate_model->where($where)->first('cate_id');
            $cate_model->find($id);
            $res = $cate_model->increment('buy_number',$buy_number);

        }else{
//            添加
            $cate_model->user_id = GetId();
            $cate_model->goods_id = $goods_id;
            $cate_model->buy_number = $buy_number;
            $res = $cate_model->save();
        }
        if ($res){
            return redirect("Prolist/index");
        }else{
            return redirect("Prolist/proinfo/$goods_id/$error");
        }
    }

    /*
     * 获取总价
     */
    public function getCount(Request $request){
        $goods_id = $request->goods_id;
        $id = GetId();
        //获取购买数量，商品价格
        $where['user_id']=$id;
        $cart_model = new Cart;
        $info = $cart_model->join('goods','cart.goods_id','=','goods.goods_id')->select('buy_number','shop_price')->where($where)->whereIn('cart.goods_id',$goods_id)->get();
        $count=0;
        foreach($info as $k=>$v){
            $count+= $v->shop_price*$v->buy_number;
        }
        return $count;
    }

    /*
     * 购物车商品购买数量修改
     */
    public function SaveBuyNumber(Request $request){
        $goods_id = $request->goods_id;
        $buy_number = $request->buy_number;
        $where = [
            ['goods_id','=',$goods_id],
            ['user_id','=',GetId()],
        ];
        $cart_mdoel = new Cart;
        $res = $cart_mdoel ->where($where)->update(['buy_number'=>$buy_number]);

    }

    /*
     * 删除购物车对应商品
     */
    public function RemoveGoodsId($goods_id){
        $cart_model = new Cart;
        $where = [
            ['user_id','=',GetId()],
            ['goods_id','=',$goods_id],
        ];
        $res = $cart_model->where($where)->update(['is_del'=>2]);
    }

    /*
     * 点击结算
     */
    public function Pay($cate_id){
        $cate_id_old = $cate_id;
        $cate_id = explode(',',$cate_id_old);
        $cate_model = new Cart;
//        购买的商品
        $data = $cate_model->join('goods','cart.goods_id','=','goods.goods_id')->where('is_del','=',1)->whereIn('cate_id',$cate_id)->get();
//        商品总价
        $info = $cate_model->join('goods','cart.goods_id','=','goods.goods_id')->select('buy_number','shop_price')->whereIn('cart.cate_id',$cate_id)->get();
        $count=0;
        foreach($info as $k=>$v){
            $count+= $v->shop_price*$v->buy_number;
        }
//        收货地址
        $addrea_model = new Address;
        $where = [
            ['user_id','=',GetId()],
            ['is_del','=',1],
        ];
        $ressInFo = $addrea_model->where($where)->count();
        if($ressInFo  > 0){
            $where = [
                ['user_id','=',GetId()],
                ['is_del','=',1],
                ['is_default','=',1],
            ];
            $ressInFo = $addrea_model->where($where)->first();
            return view('car/pay',['data'=>$data,'count'=>$count,'ressInFo'=>$ressInFo,'cate_id'=>$cate_id_old]);
        }else{
            return view('car/pay',['data'=>$data,'count'=>$count,'cate_id'=>$cate_id_old]);
        }

    }



}
