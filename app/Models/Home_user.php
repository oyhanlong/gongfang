<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home_user extends Model
{
    //
    //此模型关联的数据表
    protected $table = 'zy_user';

    //    表的主键

    //不更新created_at  updated_at字段
    public $timestamps = false;

    protected $fillable = ['id', 'username','password','phone','email'];

    protected $hidden = ['remember_token'];



}
