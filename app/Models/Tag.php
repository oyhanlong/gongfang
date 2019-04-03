<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_tag';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = ['tag_name', 'cid'];

    /**
     * 要排除不分配的属性
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    /*
    * 设置不检测时间
    */
    public $timestamps = false;

    public $primaryKey = 'tag_id';

    /*
    *   标签表与分类表的关系  属于
    */ 
    public function category()
    {
        return $this->belongsTo("App\Models\Category","cid");
    }

    /*
    *   标签表与问题表的关系  多对多
    */
    public function question()
    {
        return $this->belongsToMany('App\Models\Question','zy_question_tag','tid','qid');
    }
}
