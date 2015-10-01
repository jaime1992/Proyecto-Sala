<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumnos extends Model {

protected $table = 'alumnos';

	 public function user()
    {
        return $this->belongsTo('App\Models\user');
    }



}
