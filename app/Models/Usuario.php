<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends \UTEM\Dirdoc\Auth\Models\DirdocWSUser {
    
 
    protected $table = 'usuarios';
	//protected $primaryKey = 'rut';
    protected $fillable = ['rut', 'nombres', 'apellidos','email'];
    public $timestamps =true;

   public function roles()
    {
      return $this->belongsToMany('App\Models\Rol', 'roles_usuarios', 'usuario_rut', 'rol_id');
    }
    
     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
      'rut'         => 'required|valid_rut|unique:usuarios',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
      'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
      'apellidos'   => 'required|alpha_spaces|max:255',
      'email'       => 'required|valid_email|unique:usuarios|max:255'
            );
    }

}
