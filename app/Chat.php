<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $guarded = array('id');
    //
    public function user()
     {
         return $this->belongsTo(User::class,'user_id');
   }

   /**
    * チャットログ取得
    * @param  [type] $query    [description]
    * @param  [type] $request  [description]
    * @param  [type] $category [description]
    * @return [type]           [description]
    */
   public function scopeLog($query, $request)
    {
      $query->where('group_id','=',$request->id)
            ->where('chat_category', '=', $request->category);
    }

    public function confirmations()
    {
      return $this->hasMany(Confirmation::class);
    }
}
