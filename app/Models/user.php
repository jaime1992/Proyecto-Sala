<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class user extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	protected $table = 'users';


	protected $fillable = ['name', 'email', 'password'];
  //La propiedad fillable especifica los atributos deben ser asignables de forma masiva

	
    protected $hidden = ['password', 'remember_token'];

      public function setPasswordAttribute($password) {
           $this->attributes['password'] = Hash::make($password);
       }

    public function alumnos()
    {
        return $this->hasMany('App\Models\alumnos', 'user_id', 'id');
    }
}

 /* public function profile()
   {
    return $this->hasOne('App\Models\User_perfil');

    //hasOne: cada usuario tiene su propio perfil
   }
   */