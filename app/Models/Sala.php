<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    protected $table = 'salas';
    protected $fillable = ['nombre','descripcion','capacidad','campus_id','tipo_sala_id'];  //capacidad???
    public $timestamps =true;


    public function campus()
    {
        return $this->belongsTo('App\Models\Campus','campus_id','id');
    }

    public function tipos()
    {
        return $this->belongsTo('App\Models\TipoSala','tipo_sala_id','id');
    }

    public function horarios()
    {
        return $this->HasMany('App\Models\Horario');
    }

    public function periodos()
    {
   
        return $this->belongsToMany('App\Models\Periodo', 'periodo_sala','sala_id', 'periodo_id')->withPivot('fecha','curso_id');
    }

    

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'            =>'required|alpha_spaces_num|max:255|unique:salas',
            'descripcion'       => 'required|alpha_spaces_num|max:255',
            'capacidad'         => 'required|numeric|entre1y50',
            'campus_id'         => 'required',
            'tipo_sala_id'      =>'required',
            );
    }
    
    

    

}


