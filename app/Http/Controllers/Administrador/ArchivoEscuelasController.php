<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Models\Departamento;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoEscuelasController extends Controller {

	

public function index() //masivos datos
	{
	$escuelas= Escuela::paginate();
        $data = array(
            array('nombre', 
            	  'descripcion',
            	  'departamento_id'),
            );

        foreach($escuelas as $esc){
            $datos = array();
            array_push($datos,$esc->nombre,
            	              $esc->descripcion,
            	              $esc->departamentos->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Escuelas', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$escuelas = Escuela::find($id);
        //dd($Campus);
        if ($escuelas) {
            $data = array(
                array('nombre', 
            	      'descripcion',
            	      'departamento_id'),

                array($escuelas->nombre,
            	      $escuelas->descripcion,
            	      $escuelas->departamentos->nombre),
            );

            Excel::create('Escuelas' . $escuelas->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

 }

}