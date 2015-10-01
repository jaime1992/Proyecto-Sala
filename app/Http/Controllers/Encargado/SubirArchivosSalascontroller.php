<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\TipoSala;
use App\Models\Campus;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class SubirArchivosSalasController extends Controller {

	public function index()
     {
	  return \View::make('Encargado.AsignarSala.listaModificarSala');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		  $campus = $request->get('campus');
		  $tipos  = $request->get('tipos');

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use($campus,$tipos)
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

				 if(!Sala::where('nombre',$value->nombre)->first()){

					$var = new Sala();
					$var->fill([
						'nombre'       => $value->nombre,
						'descripcion'  => $value->descripcion,
					    'capacidad'    => $value->capacidad,
						'campus_id'    => $campus,
						'tipo_sala_id' => $tipos,

 						]);
					$var->save();
				}
			}
				
			})->get();

		   \Storage::delete($nombre);

		  Session::flash('message', 'Las Salas fueron agregadas exitosamente!');
	       return redirect()->route('Encargado.salas.index');
	       
	}
}
