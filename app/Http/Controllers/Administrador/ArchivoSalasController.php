<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Campus;
use App\Models\TipoSala;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoSalasController extends Controller {

	public function index() //masivos datos
	{
	  $salas= Sala::paginate();
        $data = array(
            array('nombre', 
            	  'descripcion',
            	  'campus_id',
            	  'tipo_sala_id'),
            );

        foreach($salas as $sal){
            $datos = array();
            array_push($datos,$sal->nombre,
            	              $sal->descripcion,
            	              $sal->campus->nombre,
            	              $sal->tipos->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Salas', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$salas = Sala::find($id);
        //dd($Campus);
        if ($salas) {
            $data = array(
                array('nombre', 
            	      'descripcion',
            	      'campus_id',
            	      'tipo_sala_id'),

                array($salas->nombre,
            	      $salas->descripcion,
            	      $salas->campus->nombre,
            	      $salas->tipos->nombre),
            );

            Excel::create('Salas' . $salas->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }


 }

}
