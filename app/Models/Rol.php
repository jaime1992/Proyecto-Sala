<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Rol extends Model 
{ 
    protected $table = 'roles';
    protected $fillable = ['usuario_rut','rol_id','nombre','descripcion'];
    public $timestamps =true;

    public function usuarios()
    {
      return $this->belongsToMany('App\Models\Usuario', 'usuario_tiene_roles', 'rol_id', 'usuario_rut');
      //->withTimestamps();
    }

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces',   
			'descripcion'     => 'required|alpha_spaces'
            );
    }

}