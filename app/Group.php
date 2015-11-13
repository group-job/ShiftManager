<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'user_id'];

    // 管理しているグループ一覧
    public function scopeManager($query)
    {
      $query->where('user_id','=',22);
    }

    //所属しているグループ情報取得
    public function scopeGroup($query,$id)
    {
      if ($id) {
        foreach ($id as $value) {
          $query->orWhere('id', '=', $value['group_id']);
        }
        // $query->whereIn('id',$id);
      }
      // dd($query);

      // $query->orWhere('id', '=', $id[0]['group_id']);
      // $query->orWhere('id', '=', $id[1]['group_id']);
    }
    public function tasks()
   {
       return $this->hasMany(Shift::class);
     }


}
