<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Departamento;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

use Validator;


class SubirArchivosAsignaturasController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.AsignaturaCrud.crearAsignatura');
     }

	 public function store(Request $request)
	 {
		   $file= $request->file('file'); //obtenemos el campo file obtenido por el formulario
		  if(is_null($request->file('file')))
		  {
		  	Session::flash('message', 'Seleccion el archivo');
		  	 return redirect()->back();

		  }
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		   $depa = $request->get('departamentos');

		    $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$departamentos= Departamento::whereNombre($value->departamento_id)->pluck('id');
					if(is_null($departamentos))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					

					$var = new Asignatura();
					 $datos=[
						'nombre'          => $value->nombre,
						'codigo'          => $value->codigo,
						'descripcion'     => $value->descripcion,
						'departamento_id' => $departamentos,
					
						];
					$validator = Validator::make($datos, Asignatura::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Las Asignaturas ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.asignaturas.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Las Asignaturas fueron agregadas exitosamente!');
	       return redirect()->route('Administrador.asignaturas.index');
	       
	}
}
