<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;
use Maatwebsite\Excel\Facades\Excel;

class ArchivosEstudianteEController extends Controller {

	public function index() //masivos datos
	{
		$estudiantes= Estudiante::paginate();
        $data = array(
            array('rut', 
            	  'nombres', 
            	  'apellidos',
            	  'email',
            	  'carrera_id'),
            );

        foreach($estudiantes as $est){
            $datos = array();
            array_push($datos,$est->rut,
            	              $est->nombres,
            	              $est->apellidos,
            	              $est->email,
            	              $est->carreras->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Estudiantes', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$estudiantes = Estudiante::find($id);
        //dd($Campus);
        if ($estudiantes) {
            $data = array(
                array('rut', 
            	      'nombres', 
            	      'apellidos',
            	      'email',
            	      'departamento_id'),

                array($estudiantes->rut,
            	      $estudiantes->nombres,
            	      $estudiantes->apellidos,
            	      $estudiantes->email,
            	      $estudiantes->carreras->nombres),
            );

            Excel::create('Estudiantes' . $estudiantes->nombres, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}
}
