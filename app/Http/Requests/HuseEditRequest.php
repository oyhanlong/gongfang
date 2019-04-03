<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HuseEditRequest extends Request
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
            'email' => 'required|email',
            'phone' => 'required|regex:/1[3578]\d{9}/',

        ];
    }
    public function messages()
    {
        return [
            //自定义验证
            'email.required' => '邮箱不能为空！',
            'email.email' => '邮箱格式错误',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不正确',

        ];
    }
}
