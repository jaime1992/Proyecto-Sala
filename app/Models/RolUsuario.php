<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class RolUsuario extends Model 
{ 
	protected $table = 'roles_usuarios'; 
	protected $fillable = ['usuario_rut','rol_id']; 
	public $timestamps =true; 

	public function usuarios()
	{
		return $this->belongsTo('App\Models\Usuario','usuario_rut');
	}


	public function roles()
	 { 
	 	return $this->belongsTo('App\Models\Rol','rol_id','id'); 
	} 


 public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces',   
			'descripcion'     => 'required|alpha_spaces'
            );
    }
}

	