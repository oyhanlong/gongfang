<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //此模型关联的数据表
    protected $table = 'zy_adminuser';

    // 表的主键
    public $primaryKey = 'id';
    //不更新created_at  updated_at字段
    public $timestamps = false;

    //是否允许批量填充数据
    // public $fillable = ['admin_name','admin_pass'];


    //不允许批量填充的字段  如果设置$fillable 就不要在设置$guarded
    public $guarded = [];
    public function roles()
    {
        // 参数一 要关联的模型
        // 参数二  将两个模型联系起来的关联表的表名
        // 参数三 当前模型在关联表中的字段名
        // 参数四 被关联模型在关联表中的字段名

        return $this->belongsToMany('App\Models\Role','zy_role_adminuser','admin_id','role_id');
    }
}
