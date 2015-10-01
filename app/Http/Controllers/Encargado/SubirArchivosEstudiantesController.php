<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;


class SubirArchivosEstudiantesController extends Controller {

	public function index()
     {
	  return \View::make('Encargado.Estudiante.crearEstudiantesE');
     }

	  public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 

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

		   $carreras = $request->get('carreras');
		      $falla = false;


		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)use (&$falla)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{

					$carreras= Carrera::whereNombre($value->carrera_id)->pluck('id');
					if(is_null($carreras))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}
					

					$var = new Estudiante();
					
					      $datos=[
						'rut'         => $value->rut,
						'nombres'     => $value->nombres,
						'apellidos'   => $value->apellidos,
						'email'       => $value->email,
						'carrera_id'  => $carreras,
						];
                     $validator = Validator::make($datos, Estudiante::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Estudiantes ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Encargado.estudiantes.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Los Estudiantes fueron agregados exitosamente!');
	       return redirect()->route('Encargado.estudiantes.index');
	       
	}

}
