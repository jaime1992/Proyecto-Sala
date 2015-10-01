<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

     protected $table = 'cursos';
	 protected $fillable = ['asignatura_id','docente_id','semestre','anio', 'seccion']; 
	public $timestamps =true;
   
    public function asignaturas()
    {
        return $this->belongsTo('App\Models\Asignatura','asignatura_id','id');
    }
    public function docentes()
    {
        return $this->belongsTo('App\Models\Docente','docente_id','id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany('App\Models\Estudiante'); //no me funciona
    }

    public function horarios()
    {
        return $this->HasMany('App\Models\Horario');
    }

  
     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'semestre'      =>'required|numeric|unique:cursos',
            'anio'          => 'required|numeric|unique:cursos',   //sacare alpha, me webea el espacio ing madera
            'seccion'       => 'required|numeric|unique:cursos',
            'asignatura_id' =>'required',
            'docente_id'    => 'required',
            );
    }
    

}
