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
    public function joiningEmployments()
    {
      return $this->hasMany(Employment::class)->where('start_date','!=', '0000-00-00');
    }
    public function rates()
    {
      return $this->hasMany(Rate::class);
    }
   public function user()
    {
      return $this->belongsTo(User::class,'manager_id');
    }

    public function chats()
    {
      return $this->hasMany(Chat::class);
    }



}
