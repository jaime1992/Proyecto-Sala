<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\TipoSala;
use App\Models\Campus;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosSalasController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.SalaCrud.crearSala');
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

		  $campus = $request->get('campus');
		  $tipos  = $request->get('tipos');

		  $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$campus= Campus::whereNombre($value->campus_id)->pluck('id');
					$tipos=  TipoSala::whereNombre($value->tipo_sala_id)->pluck('id');
					//echo $facultades."<br>";
					
					if(is_null($campus))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					if(is_null($tipos))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}
					//if(!Sala::whereNombre('campus_id',$campus)->whereNombre('tipo_sala_id',$tipos)->first()){

					$var = new Sala();
			        $datos=[
					
						'nombre'       => $value->nombre,
						'descripcion'  => $value->descripcion,
					    'capacidad'    => $value->capacidad,
						'campus_id'    => $campus,
						'tipo_sala_id' => $tipos,

 					];
					$validator = Validator::make($datos, Sala::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Las Salas ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.salas.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Las Salas fueron agregadas exitosamente!');
	       return redirect()->route('Administrador.salas.index');
	       
	}
}
