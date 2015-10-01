<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $table = 'periodo_sala';
  protected $fillable = ['fecha','sala_id','periodo_id','curso_id'];
  //public $timestamps =true;

    public function salas()
    {
       return $this->belongsTo('App\Models\Sala','sala_id','id');
    }

    public function periodos()
    {
       return $this->belongsTo('App\Models\Periodo','periodo_id','id');
    }

    public function cursos()
    {
       return $this->belongsTo('App\Models\Curso','curso_id','id');
    }

   /*public static function query_nombre($nombre){
        return Horario::select('id')
                ->whereNombre($nombre)
                ->first();
    }*/

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|alpha_spaces',   
      'descripcion'     => 'required|alpha_spaces'
            );
    }


}
