<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Sala;
use App\Models\Periodo;
use App\Models\Curso;
use App\Models\Horario;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoHorariosController extends Controller {

	public function index() //masivos datos
	{
	    $horarios= Horario::paginate();
        $data = array(
            array('fecha', 
            	  'sala_id', 
            	  'periodo_id',
            	  'curso_id'),
            );

        foreach($horarios as $hor){
            $datos = array();
            array_push($datos,$hor->fecha,
            	              $hor->salas->nombre,
            	              $hor->periodos->bloque,
            	              $hor->cursos->seccion);
            
            array_push($data,$datos);
        }

        Excel::create('Horarios', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$horarios = Horario::find($id);
        //dd($Campus);
        if ($horarios) {
            $data = array(
                array('fecha', 
                  'sala_id', 
                  'periodo_id',
                  'curso_id'),

                array($horarios->fecha,
                      $horarios->salas->nombre,
                      $horarios->periodos->bloque,
                      $horarios->cursos->seccion),
            
            );

            Excel::create('Horarios' . $horarios->fecha, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

 }
}