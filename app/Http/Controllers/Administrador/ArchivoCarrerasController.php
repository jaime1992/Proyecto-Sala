<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Escuela;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoCarrerasController extends Controller {

 public function index() //masivos datos
 {
      $carreras= Carrera::paginate();
        $data = array(
            array('codigo', 
            	  'nombre', 
            	  'descripcion',
            	  'escuela_id'),
            );

        foreach($carreras as $car){
            $datos = array();
            array_push($datos,$car->codigo,
            	              $car->nombre,
            	              $car->descripcion,
            	              $car->escuelas->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Carreras', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$carreras = Carrera::find($id);
        //dd($Campus);
        if ($carreras) {
            $data = array(
                array('codigo', 
            	      'nombre', 
            	      'descripcion',
            	      'escuela_id'),

                array($carreras->codigo,
            	      $carreras->nombre,
            	      $carreras->descripcion,
            	      $carreras->escuelas->nombre),
            );

            Excel::create('Carreras' . $carreras->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}
}
