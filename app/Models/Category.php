<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_category';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = ['cate_name', 'pid','path','status'];

    /**
     * 要排除不分配的属性
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    * 设置不检测时间
    */
    public $timestamps = false;

     public function tag()
    {
        return $this->hasMany('App\Models\Tag','cid');
    }

}
