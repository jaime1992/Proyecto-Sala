<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;


class SubirArchivosCursosController extends Controller {

  public function index()
     {
	  return \View::make('Administrador.CursoCrud.crearCrud');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  //obtenemos el campo file obtenido por el formulario


		    if(is_null($request->file('file')))
		  {
		  	Session::flash('message', 'Seleccion el archivo');
		  	 return redirect()->back();

		  }
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		  $asignaturas = $request->get('asignaturas');
		  $docentes    = $request->get('docentes');
		  $falla = false;


		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use (&$falla)			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$asignaturas= Asignatura::whereNombre($value->asignatura_id)->pluck('id');
					$docentes=  Docente::whereNombres($value->docente_id)->pluck('id');
					//echo $facultades."<br>";
					
					if(is_null($asignaturas))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					if(is_null($docentes))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}
                    //if(!Curso::whereNombre('asignatura_id',$asignaturas)->whereNombres('docente_id',$docentes)->first()){


					$var = new Curso();
					 $datos=[
					
						'asignatura_id'  => $asignaturas,
						'docente_id'     => $docentes,
						'semestre'       => $value->semestre,
						'anio'           => $value->anio,
					    'seccion'        => $value->seccion,

 						];
 				 $validator = Validator::make($datos, Curso::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Cursos ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.cursos.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Los Cursos fueron agregados exitosamente!');
	       return redirect()->route('Administrador.cursos.index');
	       
	}
}
