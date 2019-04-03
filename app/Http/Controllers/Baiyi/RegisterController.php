<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Models\Home_user;
use App\Models\Homedetails;

use Hash;


class RegisterController extends Controller
{



    /**
     * 引入前台注册页面
     */
    public function index()
    {
        return view('baiyi.register.index');
    }

    /**
     * 验证码图片
     */
    public function code($tmp)
    {
         $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(28);
        $builder->setMaxBehindLines(2);
        $builder->setMaxFrontLines(2);
        // 可以设置图片宽高及字体
        $builder->build($width = 127, $height = 44, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    /**
     * ajax验证 验证码 并查询数据库,如有手机号,则不能注册,验证码and手机号都满足
     *          要求,则发送手机短信
     */
    public function getVerifyCode(Request $request)
    {
       $phone = $request->input('phone');

        $code = rand(1000,9999);
        session(['phone'=>$code]);
        // 18813044687
        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C80932059&password=d7fc16776cd88777d81628ce6be056cf&format=json&mobile='.$phone.'&content=您的验证码是：'.$code.'。请不要把验证码泄露给其他人。';
        $ch = curl_init();
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        // 将json转化为数组
        $arr = json_decode($res,true);
        echo $arr['code'];

    }

    public function doRegister(Request $request)
    {
        $data = $request->all();

        $phone = $data['phone'] ;
        $phoneCode = $data['phoneCode'];
        $password = Hash::make($data['password']);


        $arr = ['username'=>'游客'.date('Ymd').mt_rand(100,999),'phone'=>$phone,'password'=>$password];
        // dd($arr);
        if($phoneCode != session('phone')){
            return 0;
        }else{
            $res = Home_user::create($arr);
            $id = $res->id;
            $arr = ['uid'=>$id,'code'=>20];
            Homedetails::create($arr);
            return 1;
        }



    }


    //加载协议页面
    public function deal()
    {
        return view('baiyi.register.deal');
    }
}