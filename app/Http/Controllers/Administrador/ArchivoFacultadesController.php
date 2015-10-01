<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Facultad;
use App\Models\Campus;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;

class ArchivoFacultadesController extends Controller {

	public function index() //masivos datos
	{
	  $facultades= Facultad::paginate();
        $data = array(
            array('nombre', 
            	  'descripcion',
            	  'campus_id'),
            );

        foreach($facultades as $fac){
            $datos = array();
            array_push($datos,$fac->nombre,
            	              $fac->descripcion,
            	              $fac->campus->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Facultades', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$facultades = Facultad::find($id);
        //dd($Campus);
        if ($facultades) {
            $data = array(
                array('nombre', 
            	      'descripcion',
            	      'campus_id'),

                array($facultades->nombre,
            	      $facultades->descripcion,
            	      $facultades->campus->nombre),
            );

            Excel::create('Facultades' . $facultades->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }


 }
}
