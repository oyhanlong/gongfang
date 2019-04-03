<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //此模型关联的数据表
    protected $table = 'zy_role';

    // 表的主键
    public $primaryKey = 'id';
    //不更新created_at  updated_at字段
    public $timestamps = false;

    //是否允许批量填充数据
    // public $fillable = ['role_name','role_description'];
    public $guarded = [];


    //不允许批量填充的字段  如果设置$fillable 就不要在设置$guarded
    // public $guarded = [];

    public function permissons()
    {
        return $this->belongsToMany('App\Models\Permission','zy_role_permission','role_id','per_id');
    }
}
