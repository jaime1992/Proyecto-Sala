<?php namespace App\Http\Controllers\Administrador;

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

class SalasController extends Controller {

	
	public function index()
	{
		
		$salas=Sala::with('campus','tipos')->get();
		return view('Administrador.SalaCrud.listaSala', compact('salas'));

		// use Illuminate\Database\Query\Builder\docentes; mal puesto el nombre en la funcion 
		// en el modelo, lo tenia como docente y asignatura
	}

	
	public function create()
	{
	    $campus=Campus::lists('nombre','id');
	    $tipos=TipoSala::lists('nombre','id');
		return view('Administrador.SalaCrud.crearSala')
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
		$data= Request::only('nombre','descripcion','capacidad','campus_id','tipo_sala_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'nombre'            =>'required|alpha_spaces_num|max:255',
			'descripcion'       => 'required|alpha_spaces_num|max:255',
			'capacidad'         => 'required|numeric|entre1y50'
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
       	 return redirect()->route('Administrador.salas.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$salas = Sala::findOrFail($id);
		$campus= Campus::lists('nombre','id');
		$tipos= TipoSala::lists('nombre','id');

       return view('Administrador.SalaCrud.editarSala', compact('salas','campus','tipos'));
    }

	public function update(EditSalasRequest $request, $id)
	{
     $salas= Sala::findOrFail($id);
	 $salas->fill(Request::all());
	 $salas->save();
	Session::flash('message', 'La sala '. $salas->nombre. ' fue modificada con éxito');
	return redirect()->route('Administrador.salas.index');  
	}

	
	public function destroy($id)
	{
	    $salas = Sala::find($id);
		$salas->delete();
		Session::flash('message', 'La sala '. $salas->nombre. ' fue eliminada con éxito');
	    return redirect()->route('Administrador.salas.index');
	}
}
