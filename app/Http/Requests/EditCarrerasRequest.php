<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCarrerasRequest extends Request {

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
			'codigo'       =>'required|numeric',
			'nombre'       =>'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
			'descripcion'  =>'required|alpha_spaces_num|max:255'
		];
	}

}
