<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\TipoSala;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoTipoSalasController extends Controller {

	public function index()   //masivos datos
	{
		$tipos = TipoSala::paginate();
        $data = array(
            array('Nombre', 
            	  'Descripcion'),
            );

        foreach($tipos as $tip){
            $datos = array();
            array_push($datos,$tip->nombre,
            	              $tip->descripcion
            	              );
            
            array_push($data,$datos);
        }

        Excel::create('TipoSala', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	//un dato
	public function show($id)
	{
		$tipos = TipoSala::find($id);
        //dd($Campus);
        if ($tipos) {
            $data = array(
                array('Nombre', 
                	  'Descripcion'),

                array($tipos->nombre, 
                	  $tipos->descripcion),
            );

            Excel::create('TipoSala' . $tipos->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}

}
