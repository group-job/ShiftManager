<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $fillable = ['name', 'user_id'];

    // 参加グループ一覧取得
    public function scopeMemberGroup($query)
    {
      $query->where('user_id','=',1);
    }
}
