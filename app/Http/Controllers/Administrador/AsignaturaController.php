<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Asignatura;
use App\Http\Requests\EditAsignaturasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AsignaturaController extends Controller {

	
	public function index()
	{
		$asignaturas=Asignatura::with('departamentos')->get();
	    
		return view('Administrador.AsignaturaCrud.listaAsignatura', compact('asignaturas')); 
	}

	public function create()
	{
		$departamentos=Departamento::lists('nombre','id');
		return view('Administrador.AsignaturaCrud.crearAsignatura')->with('departamentos',$departamentos);
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'
	}


	public function store()
	{
		$data= Request::only('codigo','nombre','descripcion','departamento_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'codigo'       =>'required|alpha_spaces_num|unique:asignaturas',
			'nombre'       => 'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
			'descripcion'  => 'required|alpha_spaces_num|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $asignaturas=Asignatura::create($data);
         $asignaturas->save();
         Session::flash('message', 'La asignatura '. $asignaturas->nombre. ' fue creada con éxito');
       	 return redirect()->route('Administrador.asignaturas.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$asignaturas = Asignatura::findOrFail($id);
		$departamentos=Departamento::lists('nombre','id');

       return view('Administrador.AsignaturaCrud.editarAsignatura', compact('asignaturas','departamentos'));
    }

	public function update(EditAsignaturasRequest $request, $id)
	{
     $asignaturas= Asignatura::findOrFail($id);
	 $asignaturas->fill(Request::all());
	 $asignaturas->save();
	Session::flash('message', 'La asignatura '. $asignaturas->nombre. ' fue modificada con éxito');
	return redirect()->route('Administrador.asignaturas.index');  
	}

	
	public function destroy($id)
	{
	    $asignaturas = Asignatura::find($id);
		$asignaturas->delete();
		Session::flash('message', 'La asignatura '. $asignaturas->nombre. ' fue eliminada');
	    return redirect()->route('Administrador.asignaturas.index');
	}
	

}

