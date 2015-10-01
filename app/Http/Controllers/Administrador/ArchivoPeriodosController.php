<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Periodo;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoPeriodosController extends Controller {

	public function index() //masivos datos
	{
	    $periodos= Periodo::paginate();
        $data = array(
            array('bloque', 
            	  'inicio', 
            	  'fin'),
            );

        foreach($periodos as $per){
            $datos = array();
            array_push($datos,$per->bloque,
            	              $per->inicio,
            	              $per->fin);
            
            array_push($data,$datos);
        }

        Excel::create('Periodos', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$periodos = Periodo::find($id);
        //dd($Campus);
        if ($periodos) {
            $data = array(
                array('bloque', 
                      'inicio', 
                      'fin'),

                array($periodos->bloque,
                      $periodos->inicio,
                      $periodos->fin),
                );

            Excel::create('Periodos' . $periodos->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

   }
}