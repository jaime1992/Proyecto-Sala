<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Departamento extends Model {

    
     protected $table = 'departamentos';
	 protected $fillable = ['nombre','descripcion','facultad_id'];   //facultad_id
	 public $timestamps =true;
	

	public function facultades()
    {
        return $this->belongsTo('App\Models\Facultad','facultad_id','id');
    }

    public function escuelas()
    {
    	return $this->hasMany('App\Models\Escuela');
    }

    public function docentes()
    {
        return $this->hasMany('App\Models\Docente');
    }

    public function asignaturas()
    {
        return $this->hasMany('App\Models\Asignatura');
    }

    public function funcionarios()
    {
        return $this->hasMany('App\Models\Funcionario');
    }

      public static function storeRules()
    {     
        return array(              //se utiliza un arrays asociativo
      'nombre'       => 'required|alpha_spaces|max:255|unique:departamentos',   //campo obligatorio
      'descripcion'  => 'required|alpha_spaces_num|max:255',
      'facultad_id'  =>'required',
      ); 
   }


}
