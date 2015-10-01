<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\RolUsuario;
use App\Models\Usuario;
use App\Http\Requests\EditUsuariosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class UsuariosController extends Controller {

	
	public function index()
	{
		$usuarios= Usuario::paginate();
		return view('Administrador.UsuarioCrud.listaUsuario',compact('usuarios'));
	}

	
	public function create()
	{
	    
         return view('Administrador.UsuarioCrud.crearUsuario'); 
	}

	

	public function store()
	{
		$data= Request::only('rut','nombres','apellidos','email');
         // dd($data);

         $rules= array(    //se utiliza un arrays asociativo, asociativo que es?
            'rut'         => 'required|valid_rut|unique:usuarios',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
			'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
			'apellidos'   => 'required|alpha_spaces|max:255',
			'email'       => 'required|valid_email|unique:usuarios|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $usuarios=Usuario::create($data);
         $usuarios->save();
         
         Session::flash('message', 'El Usuario '. $usuarios->nombres. ' fue creado con éxito');
       	 return redirect()->route('Administrador.usuarios.store'); 
	}


	
	public function edit($id)
	{
		
		$usuarios= Usuario::findOrFail($id);

       return view('Administrador.UsuarioCrud.editarUsuario', compact('usuarios'));
    }

	public function update(EditUsuariosRequest $request, $id)
	{
     $usuarios= Usuario::findOrFail($id);
	 $usuarios->fill(Request::all());
	 $usuarios->save();
	Session::flash('message', 'El Usuario '. $usuarios->nombres.' fue modificado con éxito');
	return redirect()->route('Administrador.usuarios.index');  
	}

	
	public function destroy($id)
	{
	    $usuarios = Usuario::find($id);
		$usuarios->delete();
		Session::flash('message', 'El usuario '. $usuarios->nombres. '  de rut ' .$usuarios->rut. ' fue eliminado');
	    return redirect()->route('Administrador.usuarios.index');
	}
}
	
