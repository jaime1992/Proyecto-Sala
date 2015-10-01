<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Departamento;
use App\Models\Campus;
use App\Models\Asignatura;
use App\Http\Requests\EditAsignaturasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;

class AsignaturaEncargadoController extends Controller {

	public function index()
	{
		//$asignaturas=Asignatura::with('departamentos')->get();

		$rut=Auth::user()->rut;

		$id_campus=Campus::select('id')->where('rut_encargado',$rut)->first()->id;  //segun id del campu, me mostrara su asignaturas
	 $campus=Campus::select('nombre')->where('rut_encargado',$rut)->first(); 
			//dd($id_campus);

			$asignaturas=Asignatura::join('departamentos','asignaturas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus)  //me esta mostrando los departamentos de macul
			          ->select('asignaturas.*')
			         ->get();
			        // dd($asignaturas);
	    
		return view('Encargado.Asignatura.listaAsignaturaE', compact('asignaturas','campus')); 
	}

	public function create()
	{
		//$departamentos=Departamento::lists('nombre','id'); //muestra en select todos los departamentos

		$rut=Auth::user()->rut;

		$id_campus=Campus::select('id')->where('rut_encargado',$rut)->first()->id;  //segun id del campu, me mostrara su asignaturas
	 $nombre=Campus::select('nombre')->where('rut_encargado',$rut)->first()->id; 

		$departamentos=Departamento::join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus)  //me esta mostrando los departamentos de macul
			          ->select('departamentos.nombre','departamentos.id')
			         ->lists('nombre','id');
			        		return view('Encargado.Asignatura.crearAsignaturaE')->with('departamentos',$departamentos);
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
         	'codigo'       =>'required|numeric|unique:asignaturas',
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
       	 return redirect()->route('Encargado.asignaturas.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$asignaturas = Asignatura::findOrFail($id);
		$departamentos=Departamento::lists('nombre','id');

       return view('Encargado.Asignatura.editarAsignaturaE', compact('asignaturas','departamentos'));
    }

	public function update(EditAsignaturasRequest $request, $id)
	{
     $asignaturas= Asignatura::findOrFail($id);
	 $asignaturas->fill(Request::all());
	 $asignaturas->save();
	Session::flash('message', 'La asignatura '. $asignaturas->nombre. ' fue modificada con éxito');
	return redirect()->route('Encargado.asignaturas.index');  
	}

	
	public function destroy($id)
	{
	    $asignaturas = Asignatura::find($id);
		$asignaturas->delete();
		Session::flash('message', 'La asignatura '. $asignaturas->nombre. ' fue eliminada');
	    return redirect()->route('Encargado.asignaturas.index');
	}
	


}
