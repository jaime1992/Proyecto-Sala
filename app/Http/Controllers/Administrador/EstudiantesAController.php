<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Carrera;
use App\Models\Estudiante;
use App\Http\Requests\EditEstudiantesRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class EstudiantesAController extends Controller {

	public function index()
	{

     $estudiantes=Estudiante::with('carreras')->get();
	    
     return view('Administrador.EstudianteCrud.listaEstudiantes', compact('estudiantes')); 
	}

	
	public function create()
	{
		$carreras=Carrera::lists('nombre','id');
		return view('Administrador.EstudianteCrud.crearEstudiantes')
		->with('carreras',$carreras);
	}


	
	public function store()
	{
		$data= Request::only('rut','nombres','apellidos','email','carrera_id');
         // dd($data);

         $rules= array(    //se utiliza un arrays asociativo, asociativo que es?
            'rut'         => 'required|valid_rut|numeric|unique:estudiantes',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
			'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
			'apellidos'   => 'required|alpha_spaces|max:255',
			'email'       => 'required|valid_email|unique:estudiantes|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $estudiantes=Estudiante::create($data);
         $estudiantes->save();
         
         Session::flash('message', 'El Estudiante '. $estudiantes->nombres. ' fue creado con éxito');
       	 return redirect()->route('Administrador.estudiante.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$estudiantes= Estudiante::findOrFail($id);
		$carreras=Carrera::lists('nombre','id');

       return view('Administrador.EstudianteCrud.editarEstudiantes', compact('estudiantes','carreras'));
    }

	public function update(EditEstudiantesRequest $request, $id)
	{
     $estudiantes= Estudiante::findOrFail($id);
	 $estudiantes->fill(Request::all());
	 $estudiantes->save();
	Session::flash('message', 'El Estudiante '. $estudiantes->nombres.' fue modificado con éxito');
	return redirect()->route('Administrador.estudiante.index');  
	}

	
	public function destroy($id)
	{
	    $estudiantes = Estudiante::find($id);
		$estudiantes->delete();
		Session::flash('message', 'El estudiante '. $estudiantes->nombres. '  de rut ' .$estudiantes->rut. ' fue eliminado');
	    return redirect()->route('Administrador.estudiante.index');
	}
	

}

