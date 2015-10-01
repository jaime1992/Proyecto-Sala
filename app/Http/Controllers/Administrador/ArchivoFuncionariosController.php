<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;



//use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Departamento;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoFuncionariosController extends Controller {

	

	public function index() //masivos datos
	{
		$funcionarios = Funcionario::paginate();
        $data = array(
            array('rut', 
            	  'nombres', 
            	  'apellidos',
            	  'email',
            	  'departamento_id'),
            );

        foreach($funcionarios as $fun){
            $datos = array();
            array_push($datos,$fun->rut,
            	              $fun->nombres,
            	              $fun->apellidos,
            	              $fun->email,
            	              $fun->departamentos->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Funcioanrios', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$funcionarios = Funcionario::find($id);
        //dd($Campus);
        if ($funcionarios) {
            $data = array(
                array('rut', 
            	      'nombres', 
            	      'apellidos',
            	      'email',
            	      'departamento_id'),

                array($funcionarios->rut,
            	      $funcionarios->nombres,
            	      $funcionarios->apellidos,
            	      $funcionarios->email,
            	      $funcionarios->departamentos->nombre),
            );

            Excel::create('Funcionarios' . $funcionarios->nombres, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }
	}
}


