<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model {
    
    
    protected $table = 'funcionarios';
	protected $fillable = ['rut','nombres','apellidos','email','departamento_id'];
    public $timestamps =true;
	


	  public function departamentos()
    {
        return $this->belongsTo('App\Models\Departamento','departamento_id','id');
    }

     /*public static function query_nombre($nombrea){
        return Funcionario::select('id')
                ->whereNombre($nombre)
                ->first();
    } */

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'rut'         => 'required|valid_rut|unique:funcionarios',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
            'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
            'apellidos'   => 'required|alpha_spaces|max:255',
            'email'       => 'required|valid_email|unique:funcionarios|max:255'
            );
    }

}
