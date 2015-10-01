<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Http\Requests\EditPeriodosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PeriodosController extends Controller {

	
	public function index()
	{
		
		$periodos = Periodo::get(); // Cambiar esto, si la db es muy grande queda la escoba
		return view('Administrador.PeriodoCrud.listaPeriodo', compact('periodos'));
		
	}

	public function create()
	{
		return view('Administrador.PeriodoCrud.crearPeriodo');
	}


	public function store()
    {
    	$data= Request::all();         //obtenos los datos y luego es llamado abajo

		$rules= array(                     //se utiliza un arrays asociativo
			'bloque'     => 'required|numeric',   
			'inicio'     => 'required',    //ver las validaciones
			'fin'        => 'required',
		    
			);
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();   
        }
        $periodos = Periodo::create($data);
        $periodos->save();
        Session::flash('message', 'El periodo del bloque '.$periodos->bloque. ' fue creado con éxito');
        return redirect()->route('Administrador.periodos.store');
	}

	public function show($id)
	{
		
     }

	public function edit($id)
	{
	    $periodos = Periodo::findOrFail($id);
		return view('Administrador.PeriodoCrud.editarPeriodo', compact('periodos'));
	}

	public function update(EditPeriodosRequest $request, $id)
	{
	    $periodos = Periodo::findOrFail($id);
		$periodos->fill(Request::all());
		$periodos->save();
		Session::flash('message', 'El periodo del bloque  '.$periodos->bloque. ' fue modificado con éxito');
		return redirect()->route('Administrador.periodos.index');  //siempre index
	}


	public function destroy($id)
    {  
   	   //dd("eliminado: " . $id);

		$periodos = Periodo::find($id);
        // Rol::destroy($id);

		$periodos->delete();
		Session::flash('message', 'El periodo del bloque '.$periodos->bloque. ' fue eliminado');
	    return redirect()->route('Administrador.periodos.index');
	}

}