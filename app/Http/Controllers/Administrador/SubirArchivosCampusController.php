<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Campus;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosCampusController extends Controller {


     public function index()
     {
	  return \View::make('Administrador.CampusCrud.crearCampus');
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

		   $nombre=$file->getClientOriginalName(); //obtenemos el nobmre del archivo

		   \Storage::disk('local')->put($nombre, \File::get($file)); //indicamos que queremos guardar un 
		                                                             //nuevo archivo en el disco local
		   $falla = false;

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)
			{
				$result = $archivo->get();    //leer todas las filas del archivo
				// if fichero es valido => iterar con el foreach
				
             		foreach($result as $key => $value)  
				{
					//if(!Campus::where('nombre',$value->nombre)->first()){
					
					$var = new Campus();
			        $datos=[
						'nombre'         => $value->nombre,
						'direccion'      => $value->direccion,
						'latitud'        => $value->latitud,
						'longitud'       => $value->longitud,
						'descripcion'    => $value->descripcion,
						'rut_encargado'  => $value->rut_encargado
						];
					$validator = Validator::make($datos, Campus::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Campus ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.campus.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Los Campus fueron agregados exitosamente!');
	       return redirect()->route('Administrador.campus.index');
	       
	}

	
}
