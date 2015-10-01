<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso;
use App\Http\Requests\EditCursosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;




class CursosController extends Controller {


	public function index()
	{
		$cursos=Curso::with('docentes','asignaturas')->get();
		return view('Administrador.CursoCrud.listaCurso', compact('cursos'));

		// use Illuminate\Database\Query\Builder\docentes; mal puesto el nombre en la funcion 
		// en el modelo, lo tenia como docente y asignatura
	}

	
	public function create()
	{
	    $asignaturas=Asignatura::lists('nombre','id');
	    $docentes=Docente::lists('nombres','id');
		return view('Administrador.CursoCrud.crearCurso')
		->with('asignaturas', $asignaturas)
		->with('docentes', $docentes);
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'


		//sInvalid argument supplied for foreach()
	}


	public function store()
	{
		$data= Request::only('asignatura_id','docente_id','semestre','anio','seccion');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'semestre'   =>'required|numeric',
			'anio'       => 'required|numeric',   //sacare alpha, me webea el espacio ing madera
			'seccion'    => 'required|numeric'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $cursos=Curso::create($data);
         $cursos->save();
         Session::flash('message', 'El curso de la seccion '. $cursos->seccion. ' fue creado con éxito');
       	 return redirect()->route('Administrador.cursos.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$cursos = Curso::findOrFail($id);
		$asignaturas=Asignatura::lists('nombre','id');
		$docentes=Docente::lists('nombres','id');

       return view('Administrador.CursoCrud.editarCurso', compact('cursos','asignaturas','docentes'));
    }

	public function update(EditCursosRequest $request, $id)
	{
     $cursos= Curso::findOrFail($id);
	 $cursos->fill(Request::all());
	 $cursos->save();
	Session::flash('message', 'El curso de la seccion '. $cursos->seccion. ' fue modificada con éxito');
	return redirect()->route('Administrador.cursos.index');  
	}

	
	public function destroy($id)
	{
	    $cursos = Curso::find($id);
		$cursos->delete();
		Session::flash('message', 'El curso de la seccion '. $cursos->seccion. ' fue eliminado');
	    return redirect()->route('Administrador.cursos.index');
	}
}
