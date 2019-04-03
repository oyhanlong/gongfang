<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class linkInsert extends Request
{
    /**
     * 确定用户是否被授权进行此请求
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 定义友情链接添加,修改等规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            //自定义验证规则
            "f_name"=>"required|unique:zy_friendlink",
            "f_address"=>"required|unique:zy_friendlink"
        ];
    }

    /*
    * 自定义错误信息
    */
     public function messages()
    {
        return [
            // 链接验证错误信息
            "f_name.required"=>"链接名称必填 !",
            "f_name.unique"=>"链接名称已存在 !",
            "f_address.required"=>"链接地址必填 !",
            "f_address.unique"=>"链接地址已存在 !"
        ];
    }
}
