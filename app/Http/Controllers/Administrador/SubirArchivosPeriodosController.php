<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Periodo;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosPeriodosController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.PeriodoCrud.crearPeriodo');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)  use (&$falla)
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					

					$var = new Periodo();
					 $datos=[
					
						'bloque'          => $value->bloque,
						'inicio'          => $value->inicio,
						'fin'             => $value->fin
						];
                   

                   $validator = Validator::make($datos, Periodo::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Periodos ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.periodos.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Los Periodos fueron agregados exitosamente!');
	       return redirect()->route('Administrador.periodos.index');
	       
	}

}
