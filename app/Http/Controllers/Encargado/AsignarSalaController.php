<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;


use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso;
use App\Models\Campus;
use App\Models\Departamento;
use App\Models\Facultad;
use App\Models\TipoSala;
use App\Models\Sala;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class AsignarSalaController extends Controller {


public function index()
	{
		$cursos=Curso::with('docentes','asignaturas')->paginate();
		return view('Encargado.AsignarSala.listaAsignarSala', compact('cursos'));

		// use Illuminate\Database\Query\Builder\docentes; mal puesto el nombre en la funcion 
		// en el modelo, lo tenia como docente y asignatura
	}


public function create()
	{
	    $campus=Campus::lists('nombre','id');
	    $tipos=TipoSala::lists('nombre','id');
		return view('Encargado.AsignarSala.AsignarSala')
		->with('campus', $campus)
		->with('tipos', $tipos);
		
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'


		//sInvalid argument supplied for foreach() cuando pones en with dos weas
	}


	public function store()
	{
	   /*	$data= Request::only('nombre');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'nombre'            =>'required|alpha_spaces_num|max:255',
			
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $salas=Sala::create($data);
         $salas->save();
         Session::flash('message', 'La sala '. $salas->nombre. ' fue creada con éxito');
       	 return redirect()->route('Administrador.salas.store'); */ 
	}

	public function show($id)
	{
		/*$cursos=Curso::find($id);
	    $docentes=$cursos->docente;
	    $departamentos=$docentes->departamento;  //???
	    $facultades=$departamentos->facultad;
	    $campus=$facultades->campus;
	    $salas=$campus->sala;
	    dd($campus);*/
	}

	
	
}

