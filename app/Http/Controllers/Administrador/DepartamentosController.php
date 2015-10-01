<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Facultad;
use App\Http\Requests\EditDepartamentosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class DepartamentosController extends Controller {


	public function index()
	{
		$depa=Departamento::with('facultades')->get();
	    
		return view('Administrador.DepartamentoCrud.listaDepartamento', compact('depa')); 
	}
     public function create()
	 {
	 $facultades=Facultad::lists('nombre','id');
	 return view('Administrador.DepartamentoCrud.crearDepartamento')
	 ->with('facultades',$facultades);
	 }


	public function store()
	{
		$data= Request::only('nombre','descripcion','facultad_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
			'nombre'       => 'required|alpha_spaces|max:255',   //campo obligatorio
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

         $departamentos=Departamento::create($data);
         $departamentos->save();
         Session::flash('message', 'El'. $departamentos->nombre. ' fue creado con éxito');

       	 return redirect()->route('Administrador.departamentos.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$departamentos = Departamento::findOrFail($id);
		$facultades=Facultad::lists('nombre','id');

       return view('Administrador.DepartamentoCrud.editarDepartamento', compact('departamentos','facultades'));

 }
	public function update(EditDepartamentosRequest $request, $id)
	{
     $departamentos = Departamento::findOrFail($id);
	 $departamentos->fill(Request::all());
	 $departamentos->save();
	Session::flash('message', 'El '. $departamentos->nombre. ' fue modificado con éxito');
	return redirect()->route('Administrador.departamentos.index');  
	}

	
	public function destroy($id)
	{
	   $departamentos = Departamento::find($id);
		$departamentos->delete();
		Session::flash('message', 'El '. $departamentos->nombre. ' fue eliminado');
	    return redirect()->route('Administrador.departamentos.index');
	}
	

}
