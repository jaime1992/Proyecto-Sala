<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSala extends Model {

    protected $table = 'tipos_salas';
    protected $fillable = ['nombre','descripcion'];
    public $timestamps =true;

       public function salas()
    {
        return $this->hasMany('App\Models\Sala');
    } 
    

     public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'nombre'        => 'required|unique:tipos_salas',   
			'descripcion'   => 'required'
            );
    }
    
}
