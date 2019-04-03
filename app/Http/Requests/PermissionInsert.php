<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionInsert extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

      /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'per_name' => 'required',
            'per_description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            // 自定义错误信息
            'per_name.required'=>'权限名不能为空',
            'per_description.required'=>'请填写权限描述',
        ];
    }
}
