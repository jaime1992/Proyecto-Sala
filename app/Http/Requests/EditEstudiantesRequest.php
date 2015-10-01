<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditEstudiantesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'rut'         => 'required|valid_rut|min:7|max:8',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
			'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
			'apellidos'   => 'required|alpha_spaces|max:255',
			'email'       => 'required|email|valid_email|max:255'
		];
	}

}
