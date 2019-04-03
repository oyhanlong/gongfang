<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Question extends Model
{
     //此模型关联的数据表
    protected $table = 'zy_question';

    // 表的主键
    public $primaryKey = 'id';
    //不更新created_at  updated_at字段
    public $timestamps = false;

    //不允许批量填充的字段  如果设置$fillable 就不要在设置$guarded
    // public $guarded = [];


    /*
    *   问题表与回答表的关系  一对多
    */ 
    public function answers()
    {
        // 参数一 要关联的模型
        // 参数二  将两个模型联系起来的关联表的表名
        // 参数三 当前模型在关联表中的字段名
        // 参数四 被关联模型在关联表中的字段名

        return $this->hasMany('App\Models\Answer','qid');
    }
    /*
    *   问题表与用户详情表的关系  属于
    */ 
    public function userdetail()
    {
        // 参数一 要关联的模型
        // 参数二 当前模型在关联表中的字段名
        return $this->belongsTo('App\Models\UserDetail','id');
    }

    /*
    *   问题表与标题表的关系  多对多
    */ 
    public function tag()
    {
        // 参数一 要关联的模型
        // 参数二  将两个模型联系起来的关联表的表名
        // 参数三 当前模型在关联表中的字段名
        // 参数四 被关联模型在关联表中的字段名
        return $this->belongsToMany('App\Models\Tag','zy_question_tag','qid','tid');
    }

    // 获取问题发布时间距当前时间的时间差
    public function getQ_timeAtAttribute($date)
    {
        if (Carbon::now() < Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }
}
