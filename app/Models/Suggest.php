<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
     /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_suggest';

    /**
     * 设置为没有不能分配的属性
     *
     * @var array
     */
    protected $guarded = [];

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

    /*
    * 设置模型中的主键字段
    */
    public $primaryKey = 'id';
}
