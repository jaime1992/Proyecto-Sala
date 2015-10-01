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
use Illuminate\Support\Facades\Auth;

class SalasEController extends Controller {

	public function index()
	{


		

	  $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
         $salas=Sala::join('campus','salas.campus_id','=', 'campus.id')
			          ->where('salas.campus_id', $id_campus) 
			          ->select('salas.*') 
			          ->paginate();
			         // dd($salas);
		return view('Encargado.AsignarSala.listadoModificarSala', compact('salas'));

		// use Illuminate\Database\Query\Builder\docentes; mal puesto el nombre en la funcion 
		// en el modelo, lo tenia como docente y asignatura
	}

	
	public function create()
	{
	   
     //	 $campus=Campus::lists('nombre','id');
     //	$tipos=TipoSala::lists('nombre','id');

	   $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$campus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
		$tipos=TipoSala::lists('nombre','id');
     
		return view('Encargado.AsignarSala.crearSala')
		->with('campus', $campus)
		->with('tipos', $tipos);
		

		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'


		//sInvalid argument supplied for foreach() cuando pones en with dos weas*/
	}


	public function store()
	{ 
		$data=Request::only(['nombre','tipo_sala_id','descripcion','capacidad']);
		$nombre=Request::get('nombre');
		$tipo=Request::get('tipo_sala_id');
		$descripcion=Request::get('descripcion');
		$capacidad=Request::get('capacidad');
        $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		//$campus=Campus::select('nombre')->where('rut_encargado',$rut)->first();	
		$rules=array(
            		 'nombre' => 'required|',
                     'capacidad' => 'required|numeric|min:0|max:50',
                              
		 		);    				

 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}				 
		$sala=Sala::create(['nombre'=>$nombre,
			'tipo_sala_id'=>$tipo,'descripcion'=>$descripcion,'capacidad'=>$capacidad,'campus_id'=>$id_campus]);
		$sala->save();
		
         Session::flash('message', 'La sala '. $salas->nombre. ' fue creada con éxito');
       	 return redirect()->route('Encargado.salas.store'); 
	}

	
	
	public function edit($id)
	{
		
		$salas = Sala::findOrFail($id);
		$campus= Campus::lists('nombre','id');
		$tipos= TipoSala::lists('nombre','id');

       return view('Encargado.AsignarSala.modificarSalas', compact('salas','campus','tipos')); 
    }

	public function update(EditSalasRequest $request, $id)
	{
	
     $salas= Sala::findOrFail($id);
	 $salas->fill(Request::all());
	 $salas->save();
	Session::flash('message', 'La sala '. $salas->nombre. ' fue modificada con éxito');
	return redirect()->route('Encargado.salas.index');  
	}

	
	public function destroy($id)
	{
		/*
	    $salas = Sala::find($id);
		$salas->delete();
		Session::flash('message', 'La sala '. $salas->nombre. ' fue eliminada con éxito');
	    return redirect()->route('Administrador.salas.index'); */
	}
}
