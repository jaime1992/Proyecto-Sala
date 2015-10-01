<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TipoSala;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;


class SubirArchivosTipoSalaController extends Controller {

	 public function index()
     {
	  return \View::make('Administrador.TipoSalaCrud.crearTipoSala');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
		  $file= $request->file('file'); //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); //obtenemos el nobmre del archivo

		   \Storage::disk('local')->put($nombre, \File::get($file)); //indicamos que queremos guardar un 
		                                                             //nuevo archivo en el disco local
		     $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)  use (&$falla)
			{
				$result = $archivo->get();    //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$var = new TipoSala();
					 $datos=[
						'nombre'          => $value->nombre,
						'descripcion'     => $value->descripcion
						
						];

					$validator = Validator::make($datos, TipoSala::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Tipo de Sala ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.tiposSalas.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Las  Tipo de Sala fueron agregados exitosamente!');
	       return redirect()->route('Administrador.tiposSalas.index');
	       
	}
}
