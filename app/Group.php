<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['group_name', 'manager_id'];

    // 管理しているグループ一覧
    public function scopeManager($query)
    {
      $query->where('manager_id','=',22);
    }
}
