<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Goods;

class IndexController extends Controller
{
    public function index(){
        $goods_model = new Goods;
//        热卖
        $hotInfo = $goods_model->where('is_hot','=',1)->get();
//        新品
        $newInfo = $goods_model->where('is_new','=',1)->get();
//        精品
        $bestInfo = $goods_model->where('is_best','=',1)->get();

        return view('index/index',['hotInfo'=>$hotInfo,'newInfo'=>$newInfo,'bestInfo'=>$bestInfo]);

    }
}
