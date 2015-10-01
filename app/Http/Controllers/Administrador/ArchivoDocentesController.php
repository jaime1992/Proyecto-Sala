<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;



//use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Departamento;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoDocentesController extends Controller {

	public function index() //masivos datos
	{
		$docentes = Docente::paginate();
        $data = array(
            array('rut', 
            	  'nombres', 
            	  'apellidos',
            	  'email',
            	  'departamento_id'),
            );

        foreach($docentes as $doc){
            $datos = array();
            array_push($datos,$doc->rut,
            	              $doc->nombres,
            	              $doc->apellidos,
            	              $doc->email,
            	              $doc->departamentos->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Docentes', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$docentes = Docente::find($id);
        //dd($Campus);
        if ($docentes) {
            $data = array(
                array('rut', 
            	      'nombres', 
            	      'apellidos',
            	      'email',
            	      'departamento_id'),

                array($docentes->rut,
            	      $docentes->nombres,
            	      $docentes->apellidos,
            	      $docentes->email,
            	      $docentes->departamentos->nombre),
            );

            Excel::create('Docentes' . $docentes->nombres, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}
}
