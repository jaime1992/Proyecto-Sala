<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Escuela;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosCarrerasController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.CarreraCrud.crearCarrera');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');

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

		   $escuelas = $request->get('escuelas');
		      $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)  use (&$falla)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{


					$escuelas= Escuela::whereNombre($value->escuela_id)->pluck('id');
					if(is_null($escuelas))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					$var = new Carrera();
					$datos=[
					
						'codigo'          => $value->codigo,
						'nombre'          => $value->nombre,
						'descripcion'     => $value->descripcion,
						'escuela_id'      => $escuelas,
						];
			
				$validator = Validator::make($datos, Carrera::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Las Carreras ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.carreras.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Las Carreras fueron agregadas exitosamente!');
	       return redirect()->route('Administrador.carreras.index');
	       
	}

}
