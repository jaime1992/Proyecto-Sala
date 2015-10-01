<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Curso;
use App\Models\Sala;
use App\Models\Periodo;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class SubirArchivosHorariosController extends Controller {

	

	public function index()
     {
	  return \View::make('Administrador.HorarioCrud.crearHorario');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	
		  $file= $request->file('file'); 
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

		  $cursos   = $request->get('cursos');
		  $salas    = $request->get('salas');
		  $periodos = $request->get('periodos');


          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo) use($cursos,$salas,$periodos)
			{
				$result = $archivo->get();  //leer todas las filas del archivo



				foreach($result as $key => $value)  
				{
					$salas=  Sala::whereNombre($value->sala_id)->pluck('id');
					$periodos=  Periodo::whereBloque($value->periodo_id)->pluck('id');
					$cursos= Curso::where('seccion',$value->curso_id)->pluck('id');
					

					if(is_null($salas))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}

					if(is_null($periodos))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}


				if(is_null($cursos))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}
				if(!Horario::where('sala_id',$salas)->where('periodo_id',$periodos)->where('curso_id',$cursos)->first()){
					$var = new Horario();
					$var->fill([
						'fecha'       => $value->fecha,
						'sala_id'     => $salas,
						'periodo_id'  => $periodos,
						'curso_id'    => $cursos,
						]);
					$var->save();
				}
				}
			})->get();

		   \Storage::delete($nombre);

		 Session::flash('message', 'Los Horarios fueron agregados exitosamente!');
	       return redirect()->route('Administrador.horarios.index');
	       
	}

}
