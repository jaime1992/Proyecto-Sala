<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoUsuariosController extends Controller {

	public function index() //masivos datos
	{
		$usuarios= Usuario::paginate();
        $data = array(
            array('rut', 
            	  'nombres', 
            	  'apellidos',
            	  'email'),
            );

        foreach($usuarios as $usu){
            $datos = array();
            array_push($datos,$usu->rut,
            	              $usu->nombres,
            	              $usu->apellidos,
            	              $usu->email);
            
            array_push($data,$datos);
        }

        Excel::create('Usuarios', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$usuarios = Usuario::find($id);
        //dd($Campus);
        if ($usuarios) {
            $data = array(
                array('rut', 
            	      'nombres', 
            	      'apellidos',
            	      'email'),

                array($estudiantes->rut,
            	      $estudiantes->nombres,
            	      $estudiantes->apellidos,
            	      $estudiantes->email
            	      ),
            );

            Excel::create('Usuarios' . $usuarios->nombres, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}
}
