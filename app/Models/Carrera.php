<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    
	  protected $table = 'carreras';
    protected $fillable = ['codigo','nombre','descripcion','escuela_id',];  //escuela_id
    public $timestamps =true;


   public function estudiantes()
  {
  	  return $this->hasMany('App\Models\Estudiante');
  }

   public function escuelas()
    {
       
    return $this->belongsTo('App\Models\Escuela','escuela_id','id');
    } 
    


     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
      'codigo'       =>'required|numeric|unique:carreras',
      'nombre'       =>'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
      'descripcion'  =>'required|alpha_spaces_num|max:255'
            );
    }
}
