<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
  // private $groupName;
  //idからグループ名を取得するクエリを毎回打つのがめんどくさいため、groupNameを属性に
  // 持たせようかと考えたがORMのリレーション機能で簡単に習得できるため廃止

  protected $guarded = ['id'];
  public function user()
   {
       return $this->belongsTo(User::class);
   }
   public function group()
    {
        return $this->belongsTo(Group::class);
  }
}
