<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\RolUsuario;
use App\Models\Rol;
use App\Models\Usuario;
use App\Http\Requests\EditPerfilRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class PerfilCrearController extends Controller {

	
	public function index()
	{
         return view('Administrador.RolUsuarioCrud.crearRolUsuario');
	}

	
	public function create()
	{
		$roles=Rol::lists('nombre','id');
        $usuarios=Usuario::lists('id');
		return view('Administrador.RolUsuarioCrud.crearRolUsuario')
		->with('roles',$roles)
		->with('usuarios',$usuarios);
	}

	
	public function store()
	{
		 $data= Request::only('usuario_rut', 'rol_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         
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
        	         'El  Perfil del usuario fue creado con éxito');

       	 return redirect()->route('Administrador.cambiarperfil.store');  
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		//
	}

		public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}

}
