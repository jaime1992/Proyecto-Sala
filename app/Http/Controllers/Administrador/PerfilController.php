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

class PerfilController extends Controller {

	public function index()
	{

		//dd('jajaja');
		$perfil=RolUsuario::with('usuarios','roles')->get();
		return view('Administrador.RolUsuarioCrud.listaRolUsuario', compact('perfil'));

	}

	public function create()
	{
        $roles=Rol::lists('nombre','id');
        $usuarios=Usuario::lists('rut','rut');
		return view('Administrador.RolUsuarioCrud.crearRolUsuario')
		->with('roles',$roles)
		->with('usuarios',$usuarios);

	}


	public function store()
	{
         $data= Request::only('usuario_rut', 'rol_id');
         // dd($data);

         $rules= array(                     //se utiliza un arrays asociativo
         	 //'usuario_rut' =>'unique:usuarios'
         
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

  
	public function edit($id)
	{
		
		$perfil = RolUsuario::findOrFail($id);
		//$usuarios= Usuario::lists('rut','usuario_rut'); //? usuario_rut o id ??
		$rol=Rol::lists('nombre','id');

       return view('Administrador.RolUsuarioCrud.editarRolUsuario', compact('perfil','rol'));
    }

	public function update(EditPerfilRequest $request, $id)
	{
     $perfil= RolUsuario::findOrFail($id);
	 $perfil->fill(Request::all());
	 $perfil->save();
	Session::flash('message', 'El Perfil del usuario fue cambiado exitosamente!');
	return redirect()->route('Administrador.cambiarperfil.index');  
	}
 
	
}
