<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Usuario;


use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosUsuariosController extends Controller {

	
	 public function index()
     {
	  return \View::make('Administrador.Usuario.crearUsuario');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  if(is_null($request->file('file')))
		  {
		  	Session::flash('message', 'Seleccion el archivo');
		  	 return redirect()->back();

		  }
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 
		   $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)	
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					
					$var = new Usuario();
					$datos=[
						'rut'         => $value->rut,
						'nombres'     => $value->nombres,
						'apellidos'   => $value->apellidos,
						'email'       => $value->email
						];
					
				 $validator = Validator::make($datos, Usuario::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Usuarios ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.usuarios.index');
		   }
		   \Storage::delete($nombre);
		  Session::flash('message', 'Los Usuarios fueron agregados exitosamente!');
	       return redirect()->route('Administrador.usuarios.index');
	       
	}

}


