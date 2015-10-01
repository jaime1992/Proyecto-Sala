<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Campus extends Model {


	protected $table = 'campus';
    protected $fillable = ['nombre', 'direccion', 'latitud', 'longitud', 'descripcion', 'rut_encargado'];
   
    public $timestamps =true; 


    public function facultades()
    {
        return $this->hasMany('App\Models\Facultad');
    } 

      public function salas()
    {
        return $this->hasMany('App\Models\Sala');
    } 

    public static function query_nombre($nombre){
        return Campus::select('id')
                ->whereNombre($nombre)
                ->first();
    }

    public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces|max:255|unique:campus',   
            'direccion'     => 'required|alpha_spaces_num|max:255',
            'latitud'       => 'required|numeric',
            'longitud'      => 'required|numeric',   
            'descripcion'   => 'required|alpha_spaces_num|max:255',
            'rut_encargado' => 'required|valid_rut|min:7|max:8',
            );
    }
}

//campus tiene muchas facultades