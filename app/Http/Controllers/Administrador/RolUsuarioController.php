<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\RolUsuario;
use App\Http\Requests\EditRolUsuarioRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class RolUsuarioController extends Controller {


	public function index()
	{
	    $rolesusuarios=RolUsuario::with('roles')->get();
	    
		return view('Administrador.RolUsuarioCrud.listaRolUsuario', compact('rolesusuarios')); 
	}

	public function create()
	{
		$roles=Rol::lists('nombre','id');
		return view('Administrador.RolUsuarioCrud.crearRolUsuario')
		->with('roles',$roles);
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'
	}


	public function store()
	{
		$data= Request::only('rut', 'rol_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	'rut'         => 'required|valid_rut|numeric|unique:roles_usuarios|min:7|max:8'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $rolesusuarios=RolUsuario::create($data);
         $rolesusuarios->save();

        Session::flash('message', 
        	         'El rol usuario '. $rolesusuarios->rut. ' fue creado con éxito');

       	 return redirect()->route('Administrador.rolesusuarios.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$rolesusuarios= RolUsuario::findOrFail($id);
		$rol= Rol::lists('nombre','id');

       return view('Administrador.RolUsuarioCrud.editarRolUsuario', compact('rolesusuarios','rol'));
    }

	public function update(EditRolUsuarioRequest $request, $id)
	{
     $rolesusuarios= RolUsuario::findOrFail($id);
	 $rolesusuarios->fill(Request::all());
	 $rolesusuarios->save();
	
	Session::flash('message', 'El rol usuario '. $rolesusuarios->rut. ' fue modificado con éxito');

	return redirect()->route('Administrador.rolesusuarios.index');  
	}

	
	public function destroy($id)
	{
	    $rolesusuarios = RolUsuario::find($id);
		$rolesusuarios->delete();
		Session::flash('message', 'El rol usuario '. $rolesusuarios->rut. ' fue eliminado');
	    return redirect()->route('Administrador.rolesusuarios.index');
	}
	

}