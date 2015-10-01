<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCursosRequest extends Request {


	public function authorize()
	{
		return true;
		// si esta en false me sale en la pagina FORBIDDEN
	}

	public function rules()
	{
		return [
			'semestre'   =>'required|numeric',
			'anio'       => 'required|numeric',   //sacare alpha, me webea el espacio ing madera
			'seccion'    => 'required|numeric'
		];
	}

}
