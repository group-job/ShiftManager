<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];
    public function scopeMyProfile($query)
    {
      $query->where('id','=',1);
    }
    public function shifts()
   {
       $shifts = $this->hasMany(Shift::class);
      // var_dump($shifts);
       return $shifts;
   }
}
