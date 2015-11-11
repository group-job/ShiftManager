<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class GroupMember extends Model
{
    protected $fillable = ['name', 'user_id'];


}
