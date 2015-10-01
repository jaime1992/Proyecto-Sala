<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Sala;
class EncargadoController extends Controller {


	public function index()
	{
		 //$sala=Sala::with('periodos')->get();
		//dd($sala);
		return view('Encargado.bienvenidoEncargado');
	}



}
