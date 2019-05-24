<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Goods;
use App\model\Comment;
use Illuminate\Support\Facades\Cache;

class ProlistController extends Controller
{


//    所有商品
    public function index(){
        $goods_model = new goods;
        $data = $goods_model->all();

        //        新品
        $newInfo = $goods_model->where('is_new','=',1)->get();
        return view('prolist/index',['data'=>$data,'newInfo'=>$newInfo]);
    }

    //AJAX按销量排序
    public function GoNumber(){
        $goods_model = new goods;
        $newInfo = $goods_model->orderBy('go_number','desc')->get();
        echo view('prolist/gonumber',['data'=>$newInfo]);
    }

    //AJAX按价格排序
    public function ShopPrice(){
        $goods_model = new goods;
        $newInfo = $goods_model->orderBy('shop_price','desc')->get();
        echo view('prolist/gonumber',['data'=>$newInfo]);
    }


//    商品详情
    public function proinfo($id,$error=''){
        $comment_model = new Comment;
        $commentList = $comment_model->orderBy('created_at','desc')->paginate(2);
        $count = $comment_model->count();

        $goods_model = new goods;
        $data_mem = cache('data_'.$id);
        if (!$data_mem){
            echo 'model';
            $data_mem = $goods_model->where('goods_id','=',$id)->first();
            cache(['data_'.$id =>$data_mem], 60*60*12);
        }

        if(request()->ajax()){
            echo view('prolist/AjaxProinfo',['data'=>$data_mem,'error'=>$error,'id'=>$id,'commentList'=>$commentList,'count'=>$count]);
            die;
        }
        return view('prolist/proinfo',['data'=>$data_mem,'error'=>$error,'id'=>$id,'commentList'=>$commentList,'count'=>$count]);
    }

//    添加商品评论
    public function addComment(Request $request){
        $post = $request->all();
        $comment_model = new Comment;
        $post['created_at'] = date('Y-m-d H:i:s',time());
        $post['updated_at'] = date('Y-m-d H:i:s',time());
        $id = $comment_model->insertGetId($post);
        $post = $comment_model->where('c_id','=',$id)->first();
        if ($id){
            echo view('prolist/commentList',['v'=>$post]);
        }
    }
}
