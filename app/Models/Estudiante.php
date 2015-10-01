<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

 
    protected $table = 'estudiantes';
    protected $fillable = ['rut','nombres','apellidos','email','carrera_id',];
    public $timestamps =true;


	  public function carreras()
    {
        return $this->belongsTo('App\Models\Carrera','carrera_id','id');
       
    }

      public function cursos()
    {
        return $this->belongsToMany('App\Models\Curso'); //falta el id
    }

   /*public static function query_nombre($nombres){
        return Estudiante::select('id')
                ->whereNombre($nombres)
                ->first();
    } */

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'rut'         => 'required|valid_rut|unique:estudiantes',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
            'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
            'apellidos'   => 'required|alpha_spaces|max:255',
            'email'       => 'required|valid_email|unique:estudiantes|max:255',
            );
    }
}
