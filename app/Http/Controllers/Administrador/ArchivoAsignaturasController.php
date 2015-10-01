<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Departamento;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoAsignaturasController extends Controller {

	public function index() //masivos datos
	{
		$asignaturas= Asignatura::paginate();
        $data = array(
            array('codigo', 
            	  'nombre', 
            	  'descripcion',
            	  'departamento_id'),
            );

        foreach($asignaturas as $asig){
            $datos = array();
            array_push($datos,$asig->codigo,
            	              $asig->nombre,
            	              $asig->descripcion,
            	              $asig->departamentos->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Asignaturas', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$asignaturas = Asignatura::find($id);
        //dd($Campus);
        if ($asignaturas) {
            $data = array(
                array('codigo', 
            	      'nombre', 
            	      'descripcion',
            	      'departamento_id'),

                array($asignaturas->codigo,
            	      $asignaturas->nombre,
            	      $asignaturas->descripcion,
            	      $asignaturas->departamentos->nombre),
            );

            Excel::create('Asignaturas' . $asignaturas->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}

}
