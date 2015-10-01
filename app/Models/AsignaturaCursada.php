<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AsignaturaCursada extends Model
{
   
    protected $table = 'asignaturas_cursadas';
    protected $fillable = ['curso_id','estudiante_id',];
    public $timestamps =true;
   

    public function estudiantes()
    {
    	return $this->belongsTo('App\Models\Estudiante','estudiante_id','id');
    }

    public function cursos()
    {
        return $this->belongsTo('App\Models\Curso','curso_id','id');
    }

    /*public static function count_alumnos($id)
    {
        return \DB::table('asignaturas_cursadas')
            ->select('estudiante_id')
            ->where('curso_id','=',$id)
            ->count();
    }*/

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces',   
            'descripcion'     => 'required|alpha_spaces'
            );
    }
}