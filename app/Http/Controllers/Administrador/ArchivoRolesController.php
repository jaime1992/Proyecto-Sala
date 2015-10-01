<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Rol;

use Maatwebsite\Excel\Facades\Excel;

class ArchivoRolesController extends Controller {

	public function index() //masivos datos
	{
		$rol = Rol::paginate();
        $data = array(
            array('nombre', 
            	  'descripcion'),
            );
        
        foreach($rol as $rols){
            $datos = array();
            array_push($datos,$rols->nombre,
            	              $rols->descripcion);
            
            array_push($data,$datos);
        }

        Excel::create('Rol', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$rol = Rol::find($id);
        //dd($Campus);
        if ($rol) {
            $data = array(
                array('nombre', 
            	       'descripcion'),

                array($rol->nombre,
            	      $rol->descripcion),
            );

            Excel::create('Roles' . $rol->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}

}
