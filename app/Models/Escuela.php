<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Escuela extends Model {

 
    protected $table = 'escuelas';
    protected $fillable = ['nombre','descripcion','departamento_id'];  //departamento_id
    public $timestamps =true;



     //pregutnar esta relacion qlia :(
      public function departamentos()
    {
        return $this->belongsTo('App\Models\Departamento','departamento_id','id');

    }


      public function carreras()
      {
      	return $this->hasMany('App\Models\Carrera');

    }


   public static function storeRules()
    {     
        return array(              //se utiliza un arrays asociativo
      'codigo'       =>'required|alpha_spaces_num|unique:asignaturas',
      'nombre'       => 'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
      'descripcion'  => 'required|alpha_spaces_num|max:255',
      'departamento_id' => 'required',
      ); 
   }

}
