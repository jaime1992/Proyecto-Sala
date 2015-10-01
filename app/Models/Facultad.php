<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;

class Facultad extends Model {

    protected $table='facultades';
    protected $fillable = ['nombre','descripcion','campus_id'];   //campus_id
    public $timestamps =true;
	
  /* En la tabla hija, se usara la contraparte con la funcion:
    $this->belongsTo('tabla padre');

  */
   public function campus()
    {
    	return $this->belongsTo('App\Models\Campus','campus_id','id');
    }  



  /* Para relacionar la tabla padre con la tabla hija usaremos la funcion:
    $this->hasMany('tabla hija','llave foranea','clave local');

  */

    public function departamentos()
    {
       return $this->hasMany('App\Models\Departamento');
    }
   
   public static function query_nombre($nombre){
    
        return Facultad::select('id')
                ->whereNombre($nombre)
                ->first();
    } 

     public static function storeRules()
    {      

        return array(              //se utiliza un arrays asociativo
      'nombre'       => 'required|alpha_spaces|max:255|unique:facultades',   //campo obligatorio
      'descripcion'  => 'required|alpha_spaces_num|max:255',
      'campus_id'    =>'required',
      ); 
   }
}


// return $this->hasMany('App\Models\Campus','campus_id','id');