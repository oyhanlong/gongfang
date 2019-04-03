<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleUpdate extends Request
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
            'role_name' => 'required',
            'role_description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            // 自定义错误信息
            'role_name.required'=>'角色名不能为空',
            'role_description.required'=>'您还没填写角色描述',
        ];
    }
}
