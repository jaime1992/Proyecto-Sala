<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Facultad;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoDepartamentosController extends Controller {

	public function index() //masivos datos
	{
	$departamentos= Departamento::paginate();
        $data = array(
            array('nombre', 
            	  'descripcion',
            	  'facultad_id'),
            );

        foreach($departamentos as $dep){
            $datos = array();
            array_push($datos,$dep->nombre,
            	              $dep->descripcion,
            	              $dep->facultades->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Departamentos', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$departamentos= Departamento::find($id);
        //dd($Campus);
        if ($departamentos) {
            $data = array(
                array('nombre', 
            	      'descripcion',
            	      'facultad_id'),

                array($departamentos->nombre,
            	      $departamentos->descripcion,
            	      $departamentos->facultades->nombre),
            );

            Excel::create('Departamentos' . $departamentos->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

 }
}