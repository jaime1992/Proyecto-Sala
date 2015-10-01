<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Campus;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoCampusController extends Controller {

	
	public function index()
	{
		$Campus = Campus::paginate();
        $data = array(
            array('Nombre', 
            	  'Direccion', 
            	  'Latitud',
            	  'Longitud', 
            	  'Descripcion', 
            	  'Rut encargado'),
            );

        foreach($Campus as $camp){
            $datos = array();
            array_push($datos,$camp->nombre,
            	              $camp->direccion,
            	              $camp->longitud,
            	              $camp->latitud,
            	              $camp->descripcion,
            	              $camp->rut_encargado);
            
            array_push($data,$datos);
        }

        Excel::create('Campus', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)
	{
		$Campus = Campus::find($id);
        //dd($Campus);
        if ($Campus) {
            $data = array(
                array('Nombre', 
                	  'Direccion', 
                	  'Latitud', 
                	  'Longitud', 
                	  'Descripcion', 
                	  'Rut encargado'),

                array($Campus->nombre, 
                	  $Campus->direccion,
                	  $Campus->latitud,
                	  $Campus->longitud,
                	  $Campus->descripcion,
                	  $Campus->rut_encargado),
            );

            Excel::create('Campus' .  $Campus->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}

	

}
