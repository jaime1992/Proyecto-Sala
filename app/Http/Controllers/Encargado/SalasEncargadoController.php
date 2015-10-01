<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Campus;
use App\Models\TipoSala;
use App\Models\Sala;
use App\Http\Requests\EditSalasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



class SalasEncargadoController extends Controller {

	
	public function index()
	{
		$salas=Sala::with('campus','tipos')->paginate();
		return view('Encargado.Sala.listadoSala', compact('salas'));

		// use Illuminate\Database\Query\Builder\docentes; mal puesto el nombre en la funcion 
		// en el modelo, lo tenia como docente y asignatura
	}

	

	public function edit($id)
	{
		
		$salas = Sala::findOrFail($id);
		$campus= Campus::lists('nombre','id');
		$tipos= TipoSala::lists('nombre','id');

       return view('Encargado.Sala.ajusteSalas', compact('salas','campus','tipos'));
    }

	public function update(EditSalasRequest $request, $id)
	{
     $salas= Sala::findOrFail($id);
	 $salas->fill(Request::all());
	 $salas->save();
	Session::flash('message', 'La sala '. $salas->nombre. ' fue modificada conéxito');
	return redirect()->route('Encargado.modificarSalas.index');  
	}

	
	
}
