<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    //此模型关联的数据表
    protected $table = 'zy_userdetails';

    //    表的主键
    public $primaryKey = 'id';
    //不更新created_at  updated_at字段
    public $timestamps = false;
    public $guarded = [];


}

