<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Campus;
use App\Models\Facultad;
use App\Http\Requests\EditFacultadesRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



class FacultadController extends Controller {

	
	public function index()
	{
	    $facultades=Facultad::with('campus')->get();
	    //$facultades->campus->nombre;
		return view('Administrador.FacultadCrud.listaFacultad', compact('facultades')); //objeto
		//$result=Rol::with('roles_usuarios')->get();

		//$facultades=Facultad::all();
		//return view('Administrador.FacultadCrud.listaFacultad')->with('facultades',$facultades);
	}

	public function create()
	{
		$campus=Campus::lists('nombre','id');
		return view('Administrador.FacultadCrud.crearFacultad')
		->with('campus',$campus);
	}

	
	public function store()
	{
	
         $data= Request::only('nombre','descripcion','campus_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
			'nombre'       => 'required|alpha_spaces|max:255|unique:facultades',   //campo obligatorio
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

         $facultades=Facultad::create($data);
         $facultades->save();
         Session::flash('message', 'La Facultad de '. $facultades->nombre. ' fue creada con éxito');

       	 return redirect()->route('Administrador.facultades.store'); 
	}

	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{

		$facultades = Facultad::findOrFail($id);
		$campus=Campus::lists('nombre','id');
		


       return view('Administrador.FacultadCrud.editarFacultad', compact('facultades','campus'));

 }
	public function update(EditFacultadesRequest $request, $id)
	{
     $facultades = Facultad::findOrFail($id);
     // dd($facultades);
	 $facultades->fill(Request::all());

	 $facultades->save();
	 Session::flash('message', 'La Facultad de '. $facultades->nombre. ' fue modificada con éxito');
	
	return redirect()->route('Administrador.facultades.index');  
	}

	
	public function destroy($id)
	{
	   $facultades = Facultad::find($id);
        // Rol::destroy($id);

		$facultades->delete();
		Session::flash('message', 'La Facultad de '. $facultades->nombre. ' fue eliminada');
	    return redirect()->route('Administrador.facultades.index');
	}
	

}
