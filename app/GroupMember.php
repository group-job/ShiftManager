<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class GroupMember extends Model
{
    protected $fillable = ['name', 'user_id'];

    // 参加グループ一覧取得
    public function scopeJoinGroup($query)
    {
      var_dump(Auth::user()->id);
      $query->where('user_id','=',Auth::user()->id);
    }
}
