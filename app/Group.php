<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['group_name', 'manager_id'];

    public function shifts()
    {
      return $this->hasMany(Shift::class);
    }
    public function employments()
    {
      return $this->hasMany(Employment::class);
    }
    //グループに所属するユーザーのコレクションを取得
    public function scopeUsers($query,$userId)
    {
        $employments = Group::find($userId)->joiningEmployments;
        $users = array();
        foreach ($employments as $value) {
          $users[] = $value->user;
        }
        return $users;
    }

    public function joiningEmployments()
    {
      return $this->hasMany(Employment::class)->where('start_date','!=', '0000-00-00');
    }
    public function rates()
    {
      return $this->hasMany(Rate::class);
    }
   public function manager()
    {
      return $this->belongsTo(User::class,'manager_id');
    }

    public function chats()
    {
      return $this->hasMany(Chat::class);
    }



}
