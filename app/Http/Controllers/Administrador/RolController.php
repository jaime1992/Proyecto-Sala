<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Rol;
use App\Http\Requests\EditRolRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RolController extends Controller {

	public function index()
	{
		$rol=Rol::get();
		return view('Administrador.RolCrud.listaRol', compact('rol'));
	}

	
	public function create()
	{
		return view('Administrador.RolCrud.crearRol');
	}


	public function store()
	{
		$data= Request::all();         //obtenos los datos y luego es llamado abajo

		$rules= array(                     //se utiliza un arrays asociativo
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
        $rol = Rol::create($data);
        $rol->save();
           Session::flash('message', 'El Rol '. $rol->nombre. ' fue creado con éxito');
        return redirect()->route('Administrador.roles.store');
	}
	

	
	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		 $rol = Rol::findOrFail($id);
		return view('Administrador.RolCrud.editarRol', compact('rol'));
	}

	public function update(EditRolRequest $request, $id)
	{
	    $rol = Rol::findOrFail($id);
		$rol->fill(Request::all());
		$rol->save();
		 Session::flash('message', 'El Rol '. $rol->nombre. ' fue modificado con éxito');
		return redirect()->route('Administrador.roles.index');  //siempre index
	}


	public function destroy($id)
    {  
   	   //dd("eliminado: " . $id);

		$rol = Rol::find($id);
        // Rol::destroy($id);

		$rol->delete();
		Session::flash('message', 'El rol '.$rol->nombre. ' fue eliminado');
	    return redirect()->route('Administrador.roles.index');
	}

}