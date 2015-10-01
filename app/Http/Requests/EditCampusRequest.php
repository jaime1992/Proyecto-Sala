<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCampusRequest extends Request {

	
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
		    'nombre'        => 'required|alpha_spaces|max:255',   
			'direccion'     => 'required|alpha_spaces_num|max:255',
			'latitud'       => 'required|numeric',
		    'longitud'      => 'required|numeric',   
			'descripcion'   => 'required|alpha_spaces_num|max:255',
			'rut_encargado' => 'required|valid_rut|min:7|max:8'
			];
	}

}
