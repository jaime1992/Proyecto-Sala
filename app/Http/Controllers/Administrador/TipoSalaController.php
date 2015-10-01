<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\TipoSala;
use App\Http\Requests\EditTiposSalasRequest;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class TipoSalaController extends Controller {

	
	public function index()
	{
	  
		$tipos = TipoSala::paginate(); // Cambiar esto, si la db es muy grande queda la escoba
		return view('Administrador.TipoSalaCrud.listaTipoSala', compact('tipos'));
		
	}

	public function create()
	{
		return view('Administrador.TipoSalaCrud.crearTipoSala');
	}


	public function store()
    {
    	$data= Request::all();         //obtenos los datos y luego es llamado abajo

		$rules= array(                     //se utiliza un arrays asociativo
			'nombre'        => 'required',   
			'descripcion'     => 'required'
		   
			);
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();   
        }
        $tipos = TipoSala::create($data);
        $tipos->save();
        Session::flash('message', 'El tipo de sala '.$tipos->nombre. ' fue creada');
        return redirect()->route('Administrador.tiposSalas.store');
	}

	

	public function edit($id)
	{
	    $tipos= TipoSala::findOrFail($id);
		return view('Administrador.TipoSalaCrud.editarTipoSala', compact('tipos'));
	}

	public function update(EditTiposSalasRequest $request, $id)
	{
	    $tipos= TipoSala::findOrFail($id);
		$tipos->fill(Request::all());
		$tipos->save();
		Session::flash('message', 'El tipo de sala '.$tipos->nombre. ' fue modificada');
		return redirect()->route('Administrador.tiposSalas.index');  //siempre index
	}


	public function destroy($id)
    {  

		$tipos = TipoSala::find($id);
        // Rol::destroy($id);

		$tipos->delete();
		Session::flash('message', 'El tipo de sala '.$tipos->nombre. ' fue eliminado');
	    return redirect()->route('Administrador.tiposSalas.index');
	}



}