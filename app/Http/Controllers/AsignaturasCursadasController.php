<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\AsignaturaCursada;
use App\Http\Requests\EditAsignaturasCursadasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AsignaturasCursadasController extends Controller {

	
	public function index()
	{
		$cursadas=AsignaturaCursada::with('cursos','estudiantes')->paginate();
		return view('Administrador.AsignaturasCursadasCrud.listaAsignaturasCursadas', compact('cursadas'));
	}

	
	public function create()
	{
	    $cursos=Curso::lists('id','id');
	    $estudiantes=Estudiante::lists('nombres','id');
	  
		return view('Administrador.AsignaturaCrud.crearAsignatura')
		->with('cursos', $cursos)
		->with('estudiantes', $estudiantes);
		
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'


		//sInvalid argument supplied for foreach()
	}


	public function store()
	{
		$data= Request::only('curso_id','estudiante_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $cursadas=AsignaturaCursada::create($data);
         $cursadas->save();

       	 return redirect()->route('asignaturas.cursadas.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$cursadas = AsignaturaCursada::findOrFail($id);
		$cursos=Curso::lists('nombre','id');
		$estudiantes=Estudiante::lists('nombres','id');

       return view('Administrador.AsignaturaCursadaCrud.editarAsignaturasCursadas', 
       	compact('asignaturascursadas','cursos','estudiantes'));
    }

	public function update(EditAsignaturasCursadasRequest $request, $id)
	{
     $cursadas= AsignaturaCursada::findOrFail($id);
	 $cursadas->fill(Request::all());
	 $cursadas>save();
	
	return redirect()->route('asignaturas.cursadas.index');  
	}

	
	public function destroy($id)
	{
	    $cursadas = AsignaturaCursada::find($id);
		$cursadas->delete();
		Session::flash('message', 'La asignatura cursada '. $cursos->nombre. ' fue eliminada');
	    return redirect()->route('asignaturas.cursadas.index');
	}
}

	