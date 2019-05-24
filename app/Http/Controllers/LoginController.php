<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;
use Mail;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*
     * 登录视图层
     */
    public function login(){
        return view('login/login');
    }

    /*
     * 登录执行
     */
    public function register(Request $request){
        $post = $request->all();
        $user_model = new User;
        $email_reg = "/^\w{5,10}@qq.com$/";
        $phone_reg = "/^1\d{10}$/";
        if (preg_match($email_reg,$post['email'])){
            $where[] = ['email','=',$post['email']];
        }else if(preg_match($phone_reg,$post['email'])){
            $where[] = ['phone','=',$post['email']];
        }else{
            full('账号格式不正确');
        }
        $a = $user_model->where($where)->count();
        if (!($a > 0)){
            full('账号不存在');
        }
        if (preg_match($email_reg,$post['email'])){
            $where[] = ['email','=',$post['email']];

        }else{
            $where[] = ['phone','=',$post['email']];
        }
        $where[] = ['password','=',$post['password']];
        $res = $user_model->where($where)->count();
        if ($res >0){
            $id = $user_model->where($where)->first()->id;
            $request->session()->put('user_id', $id);
            success('登录成功');
        }else{
            full('密码账号不匹配');
        }
    }

    /*
     * 退出登录
     */
    public function EscLogin(Request $request){
        $request->session()->forget('user_id');
        return redirect('/login/login');
    }

    /*
     * 注册视图层
     */
    public function reg(){
        return view('login/reg');
    }

    /*
     * 注册执行
     */
    public function DoReg(Request $request){
        $post = $request->all();
//        获取验证码
        $rand = Cookie::get('code');
        if($rand != $post['code']){
            full('验证码错误');
        }
        unset($post['code']);
        unset($post['repwd']);
        $user_model = new User;
        foreach ($post as $k =>$v){
            $user_model -> $k = $v;
        }
        $a = $user_model->save();
        if ($a){
            success('注册成功');
        }else{
            full('注册失败');
        }

    }

    /*
     * 验证邮箱唯一
     */
    public function CheckEmail(Request $request){
        $email = $request->email;
        $count = User::where('email','=',$email)->count();
        echo  $count;
    }

    /*
     * 发送邮箱
     */
    public function SendEmail(Request $request){
        $email = $request->email;
        $rand = rand(1000,9999);
        $res = SendEmailDo($email,$rand);
        Cookie::queue("code", "$rand",3);
        success('验证码发送成功');
//        $a = Cookie::get('code');
    }

    /*
     * 验证手机号唯一
     */
    public function CheckPhone(Request $request){
        $email = $request->email;
        $count = User::where('phone','=',$email)->count();
        echo  $count;
    }

    /*
     * 发送手机验证码
     */
    public function SendPhone(Request $request){
        $email = $request->email;
        $myAppCode = '297c9190ad19462781f66a32a6e32422';
        $code = RandCode();
        $res = SendPhone($myAppCode,$email,$code);
        if ($res){
            Cookie::queue("code", "$code",3);
            success('验证码发送成功');
        }else{
            full1('验证码发送成功');
        }
    }

    /*
     * 验证验证码
     */
    public function checkCode(){
        $rand = Cookie::get('code');
        success($rand);
    }
}

