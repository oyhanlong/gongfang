<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HuserStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // required 字段必填  unique 字段唯一 max 最大长度
            'username' => 'required|unique:zy_user|regex:/^\w{6,18}$/',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1[3578]\d{9}$/',

        ];
    }
    public function messages()
    {
        return [
            //自定义验证
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.regex' => '用户名格式错误',
            'password.required' => '密码不能为空',
            'repassword.required' => '确认密码不能为空',
            'repassword.same' => '两次密码不一致',
            'email.required' => '邮箱不能为空！',
            'email.email' => '邮箱格式错误',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不正确',

        ];
    }
}
