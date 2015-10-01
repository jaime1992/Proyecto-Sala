<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Rol;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class SubirArchivosRolesController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.RolCrud.crearRol');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$var = new Asignatura();
					$var->fill([
						'nombre'          => $value->nombre,
						'descripcion'     => $value->descripcion,
						]);
					$var->save();
				}
			})->get();

		   \Storage::delete($nombre);

		  Session::flash('message', 'Los periodos fueron agregados exitosamente!');
	       return redirect()->route('Administrador.roles.index');
	       
	}

}
