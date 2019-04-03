<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Dohomeemail extends Request
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
            //
        'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            //自定义验证
            'email.required' => '邮箱不能为空！',
            'email.email' => '邮箱格式错误',
        ];
    }
}
