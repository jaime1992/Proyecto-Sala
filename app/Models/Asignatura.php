<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Asignatura extends Model
{
   
    protected $table = 'asignaturas';
    protected $fillable = ['codigo', 'nombre', 'descripcion','departamento_id'];
    public $timestamps =true;
   


    public function  departamentos()
    {
        return $this->belongsTo('App\Models\Departamento','departamento_id','id');
    }

    public function cursos()
    {
    	return $this->hasMany('App\Models\Curso');
    }

     public static function query_nombre($nombre){
        return Asignatura::select('id')
                ->whereNombre($nombre)
                ->first();
    }

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            
            'nombre'        => 'required|alpha_spaces|unique:asignaturas',   
            'descripcion'     => 'required|alpha_spaces',
            'departamento_id'  =>'required'
             );
    }
}




//el belonngsTo tiene que ver con lo de la llave foranea  y el has many es para las relaciones n/n
//falta el modelos de asignaturas_cursadas

//Podemos definir una relación muchos-a-muchos usando el método belongsToMany:
// Una relación uno a uno hasOne
//belongsTo Para definir el inverso de la relación del hasOne
//hasMany Un ejemplo de una relación uno-a-mucho