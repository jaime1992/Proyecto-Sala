<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditFacultadesRequest extends Request {

	
	public function authorize()
	{
		return true;
	}


	public function rules()
	{
		return [
		    'nombre'       => 'required|alpha_spaces|max:255',   //campo obligatorio
			'descripcion'  => 'required|alpha_spaces_num|max:255'
			];
	}
}
