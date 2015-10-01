<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model {

	protected $table = 'periodos';
    protected $fillable = ['bloque','inicio','fin'];
     public $timestamps =true;

    public function horarios()
    {
        return $this->HasMany('App\Models\Horario');
    }

    /* public static function query_nombre($nombre){
        return Periodo::select('id')
                ->whereNombre($nombre)
                ->first();
    }*/
    public function salas()
    { 
     return $this->belongsToMany('App\Models\Salas');

    }

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces|unique:periodos',   
            'descripcion'     => 'required|alpha_spaces',
            );
    }

}
