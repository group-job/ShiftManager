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

    public function employments()
    {
      return $this->hasMany(Employment::class);
    }
    public function joiningEmployments()
    {
      return $this->hasMany(Employment::class)->where('start_date','!=', '0000-00-00');
    }
    public function shifts()
   {
       return $this->hasMany(Shift::class);
   }
   public function groups()
   {
     return $this->hasMany(Group::class,'manager_id');
   }
   public function rates()
   {
       return $this->hasMany(Rate::class);
   }
   public function cahts()
   {
       return $this->hasMany(Chat::class);
   }
}
