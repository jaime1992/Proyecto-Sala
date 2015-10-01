<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Facultad;
use App\Models\Departamento;


use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosDepartamentosController extends Controller {

	
public function index()
     {
	  return \View::make('Administrador.DepartamentoCrud.crearDepartamento');
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

		   $facultades = $request->get('facultades');
		    $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)		
		   	{
				$result = $archivo->get();  //leer todas las filas del archivo

				foreach($result as $key => $value)  
				{
					$facultades= Facultad::whereNombre($value->facultad_id)->pluck('id');
					//echo $facultades."<br>";
					
					if(is_null($facultades))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					$var = new Departamento();
					
                      $datos=[
					    'nombre'      => $value->nombre,
						'descripcion' => $value->descripcion,
						'facultad_id'   => $facultades,
					 
						];

					$validator = Validator::make($datos, Departamento::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Departamentos ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
			
		
			})->get();
		   
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.departamentos.index');
		   }
		   \Storage::delete($nombre);

		 Session::flash('message', 'Los Departamentos fueron agregados exitosamente!');
	     return redirect()->route('Administrador.departamentos.index');
	       }
}
