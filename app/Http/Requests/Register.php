<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Register extends Request
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
            'username'=>'required|unique:zy_user|regex:/^\w{4,16}$/',
            'password'=>'required|regex:/^\w{6,16}$/',
            'repass'=>'required|same:password',
            'phone'=>'required|unique:zy_user|regex:/^1[35789]\d{9}$/',
            'phonecode'=>'required',
            'email'=>'required|email'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'用户名不能为空',
            'username.unique'=>'用户名已存在',
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.required'=>'验证密码不能为空',
            'repass.same'=>'验证密码与密码不一致',
            'phone.required'=>'手机号不能为空',
            'phone.unique'=>'手机号已存在',
            'phone.regex'=>'手机号格式不正确',
            'phonecode.required'=>'验证码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱不能为空',
        ];
    }
}
