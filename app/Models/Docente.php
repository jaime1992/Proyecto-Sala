<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

  
     protected $table = 'docentes';
	 protected $fillable = ['rut', 'nombres','apellidos','email','departamento_id'];
     public $timestamps =true;



	 public function departamentos()
    {
        return $this->belongsTo('App\Models\Departamento','departamento_id','id');
	}

     public function cursos()
    {
    	return $this->hasMany('App\Models\Curso');
    }

    /*public static function query_nombre($rut){
        return Docente::select('id')
                ->whereNombre($rut)
                ->first();
    } */

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'rut'         => 'required|valid_rut|unique:docentes|min:7|max:8',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
            'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
            'apellidos'   => 'required|alpha_spaces|max:255',
            'email'       => 'required|email|valid_email|unique:docentes|max:255',
            );
    }
}
