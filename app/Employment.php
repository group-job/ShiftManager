<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Employment extends Model
{
  // 参加グループ一覧取得
  public function scopeJoinGroup($query)
  {
    var_dump(Auth::user()->id);
    $query->where('user_id','=',Auth::user()->id);
  }
}
