<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Escuela;
use App\Models\Carrera;
use App\Http\Requests\EditCarrerasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CarrerasController extends Controller {

	
	public function index()
	{
		$carreras=Carrera::with('escuelas')->get();
	    
		return view('Administrador.CarreraCrud.listaCarrera', compact('carreras')); 
	}

	public function create()
	{
		$escuelas=Escuela::lists('nombre','id');
		return view('Administrador.CarreraCrud.crearCarrera')->with('escuelas',$escuelas);
		//no me muestra los datos de carreras :(, buscando la solucion....
	}


	public function store()
	{
		
	$data= Request::only('codigo','nombre','descripcion','escuela_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'codigo'       =>'required|numeric',
			'nombre'       =>'required|alpha_spaces|max:255',   //sacare alpha, me webea el espacio ing madera
			'descripcion'  =>'required|alpha_spaces_num|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $carreras=Carrera::create($data);
         $carreras->save();
         Session::flash('message', 'La '. $carreras->nombre. ' fue creada con éxito');
       	 return redirect()->route('Administrador.carreras.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$carreras = Carrera::findOrFail($id);
		$escuelas=Escuela::lists('nombre','id');

       return view('Administrador.CarreraCrud.editarCarrera', compact('carreras', 'escuelas'));
    }

	public function update(EditCarrerasRequest $request, $id)
	{
     $carreras= Carrera::findOrFail($id);
	 $carreras->fill(Request::all());
	 $carreras->save();
	Session::flash('message', 'La '. $carreras->nombre. ' fue modificada con éxito');
	return redirect()->route('Administrador.carreras.index');  
	}

	
	public function destroy($id)
	{
	    $carreras = Carrera::find($id);
		$carreras->delete();
		Session::flash('message', 'La '. $carreras->nombre. ' fue eliminada');
	    return redirect()->route('Administrador.carreras.index');

	  }
	

}

