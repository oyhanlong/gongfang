<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminuserInsertRequest extends Request
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
            'admin_name' => 'required|unique:zy_adminuser|regex:/^\w{5,18}$/',
            'admin_pass'=>'required',
            'repass'=>'required|same:admin_pass',
            'admin_email'=>"required|email"
        ];
    }

    public function messages()
    {
        return [
            // 自定义错误信息
            'admin_name.required'=>'用户名必填',
            'admin_name.unique'=>'用户名存在',
            'admin_name.regex'=>'用户名格式错误',
            'admin_pass.required'=>'密码必填',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'俩次密码不一致',
            'admin_email.required'=>'邮箱必填',
            'admin_email.email'=>'邮箱格式不正确',
        ];
    }
}
