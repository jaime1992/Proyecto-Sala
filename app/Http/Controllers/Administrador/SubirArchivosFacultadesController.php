<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Facultad;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;


class SubirArchivosFacultadesController extends Controller {

    public function index()
     {
	  return \View::make('Administrador.FacultadCrud.crearFacultad');
     }

	 public function store(Request $request)
	 {
		
	 	
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

		   $campus = $request->get('campus');

		    $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)
			{

				$result = $archivo->get();  //leer todas las filas del archivo
				
				foreach($result as $key => $value)  
				{
					$campus= Campus::whereNombre($value->campus_id)->pluck('id');
					//dd($value);
					if(is_null($campus))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					$var = new Facultad();
					 $datos=[
					    'nombre'      => $value->nombre,
						'descripcion' => $value->descripcion,
						'campus_id'   => $campus,
					 
						];

					$validator = Validator::make($datos, Facultad::storeRules());
					if($validator->fails()) {
						//dd($validator);
						Session::flash('message', 'Las Facultades ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
			
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.facultades.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Las Facultades fueron agregadas exitosamente!');
	       return redirect()->route('Administrador.facultades.index');
	       
	}
}
