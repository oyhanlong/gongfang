<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //此模型关联的数据表
    protected $table = 'zy_article';

    // 表的主键
    public $primaryKey = 'art_id';
    //不更新created_at  updated_at字段
    public $timestamps = false;

    public $guarded = [];
}
