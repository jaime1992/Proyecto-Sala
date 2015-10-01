<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditEscuelasRequest extends Request {

	public function authorize()
	{
		return true;
	}

	
	public function rules()
	{
		return [
			'nombre'       => 'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
			'descripcion'  => 'required|alpha_spaces_num|max:225'
		];
	}

}
