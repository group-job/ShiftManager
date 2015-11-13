<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
  private $groupName;

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
