<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Models\Home_user;
use Hash;

class ForgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载忘记密码页面
         return view('baiyi.forget.index');
    }

   /**
     * ajax验证 验证码 并查询数据库,如有手机号,则不能注册,验证码and手机号都满足
     *          要求,则发送手机短信
     */
    public function getVerifyCode(Request $request)
    {
       $phone =  $request->input('phone');
        $code =  $request->input('code');

        $res1 = Home_user::where('phone',$phone)->first();
        if($code != session('code')){
            return 0;
        }else if(!$res1){
            return 1;
        }else{
            $phoneCode = rand(1000,9999);
            session(['phone'=>$phoneCode]);

            $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C40520755&password=189ab0621f5fb81555f7bdb7bbbbd50b&format=json&mobile='.$phone.'&content=您的验证码是：'.$phoneCode.'。请不要把验证码泄露给其他人。';

            $ch = curl_init();
            // 添加apikey到header
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // 执行HTTP请求
            curl_setopt($ch , CURLOPT_URL , $url);
            $res = curl_exec($ch);
            // 将json转化为数组
            // var_dump($res);
            $arr = json_decode($res,true);
            echo $arr['code'];
        }
    }

    public function doForget(Request $request)
    {
        $data = $request->all();
        $phone = $data['phone'] ;
        $phoneCode = $data['phoneCode'];
        $password = Hash::make($data['password']);
        if($phoneCode != session('phone')){
            return 0;
        }else{
            $data = Home_user::where('phone',$phone)->first();
            $data->password = $password;
            $data->save();
            return 1;
        }
    }


}
