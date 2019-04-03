<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     //此模型关联的数据表
    protected $table = 'zy_answer';

    // 表的主键
    public $primaryKey = 'a_id';
    //不更新created_at  updated_at字段
    public $timestamps = false;

    //不允许批量填充的字段  如果设置$fillable 就不要在设置$guarded
    // public $guarded = [];
    public function questions()
    {
        // 参数一 要关联的模型
        // 参数二  将两个模型联系起来的关联表的表名
        // 参数三 当前模型在关联表中的字段名
        // 参数四 被关联模型在关联表中的字段名

        return $this->belongsTo('App\Models\Question','qid');
    }
}
