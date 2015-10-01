<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Escuela;
use App\Http\Requests\EditEscuelasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class EscuelaController extends Controller {

	
	public function index()
	{
		$escuelas=Escuela::with('departamentos')->get();
	    
		return view('Administrador.EscuelaCrud.listaEscuela', compact('escuelas')); 
	}
     function create()
	{
		$departamentos=Departamento::lists('nombre','id');
		return view('Administrador.EscuelaCrud.crearEscuela')
		->with('departamentos',$departamentos);
	}


	public function store()
	{
		$data= Request::only('nombre','descripcion','departamento_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
			'nombre'       => 'required|alpha_spaces|max:255|unique:escuelas',   //sacare alpha, me webea el espacio ing madera
			'descripcion'  => 'required|alpha_spaces_num|max:225'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $escuelas=Escuela::create($data);
         $escuelas->save();
         Session::flash('message', 'La '. $escuelas->nombre. ' fue creada con éxito');

       	 return redirect()->route('Administrador.escuelas.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$escuelas = Escuela::findOrFail($id);
		$departamentos=Departamento::lists('nombre','id');

       return view('Administrador.EscuelaCrud.editarEscuela', compact('escuelas','departamentos'));
    }

	public function update(EditEscuelasRequest $request, $id)
	{
     $escuelas = Escuela::findOrFail($id);
	 $escuelas->fill(Request::all());
	 $escuelas->save();

	 Session::flash('message', 'La '. $escuelas->nombre. ' fue modificada con éxito');
	
	return redirect()->route('Administrador.escuelas.index');  
	}

	
	public function destroy($id)
	{
	    $escuelas = Escuela::find($id);
		$escuelas->delete();
		Session::flash('message', 'La '. $escuelas->nombre. ' fue eliminada');
	    return redirect()->route('Administrador.escuelas.index');
	}
	

}

