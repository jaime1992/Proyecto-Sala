<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Carrera;
use App\Models\Campus;
use App\Models\Estudiante;
use App\Models\Departamento;
use App\Http\Requests\EditEstudiantesRequest;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class EstudianteEncargadoController extends Controller {


	public function index()
	{

     // $estudiantes=Estudiante::with('carreras')->paginate();

     $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $estudiantes=Estudiante::join('carreras','estudiantes.carrera_id','=','carreras.id')
                     ->join('escuelas','carreras.escuela_id','=','escuelas.id')
                     ->join('departamentos','escuelas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('estudiantes.*') 
			          ->paginate();
	    
     return view('Encargado.Estudiante.listaEstudiantesE', compact('estudiantes')); 
	}


	

	
	public function create()
	{
		//$carreras=Carrera::lists('nombre','id');

		  $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();

		$carreras=Carrera::join('escuelas','carreras.escuela_id','=','escuelas.id')
                     ->join('departamentos','escuelas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('carreras.*') 
			           ->lists('nombre','id');


			          
		return view('Encargado.Estudiante.crearEstudiantesE')
		->with('carreras',$carreras);
	}


	
	public function store()
	{
		$data= Request::only('rut','nombres','apellidos','email','carrera_id');
         // dd($data);

         $rules= array(    //se utiliza un arrays asociativo, asociativo que es?
            'rut'         => 'required|valid_rut|numeric|unique:estudiantes|max:12|min:11',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
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
       	 return redirect()->route('Encargado.estudiantes.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$estudiantes= Estudiante::findOrFail($id);
		$carreras=Carrera::lists('nombre','id');

       return view('Encargado.Estudiante.editarEstudiantesE', compact('estudiantes','carreras'));
    }

	public function update(EditEstudiantesRequest $request, $id)
	{
     $estudiantes= Estudiante::findOrFail($id);
	 $estudiantes->fill(Request::all());
	 $estudiantes->save();
	Session::flash('message', 'El Estudiante '. $estudiantes->nombres.' fue modificado con éxito');
	return redirect()->route('Encargado.estudiantes.index');  
	}

	
	public function destroy($id)
	{
	    $estudiantes = Estudiante::find($id);
		$estudiantes->delete();
		Session::flash('message', 'El estudiante '. $estudiantes->nombres. '  de rut ' .$estudiantes->rut. ' fue eliminado');
	    return redirect()->route('Encargado.estudiantes.index');
	}
	

}
