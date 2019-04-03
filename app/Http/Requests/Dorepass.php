<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Dorepass extends Request
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
        'password' => 'required|regex:/^\w{6,18}$/',
        ];
    }

    public function messages()
    {
        return [
            //自定义验证
            
            'password.required' => '密码不能为空',
            'password.regex' => '密码格式不对',
        ];
    }
}
