<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoCursosController extends Controller {

public function index() //masivos datos
	{
	  $cursos = Curso::paginate();
        $data = array(
            array('semestre', 
            	  'anio', 
            	  'seccion',
            	  'asignatura_id',
            	  'docente_id'),
            );

        foreach($cursos as $cur){
            $datos = array();
            array_push($datos,$cur->semestre,
            	              $cur->anio,
            	              $cur->seccion,
            	              $cur->asignaturas->nombre,
            	              $cur->docentes->nombres);
            
            array_push($data,$datos);
        }

        Excel::create('Cursos', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	public function show($id)  //un dato
	{
		$cursos = Curso::find($id);
        //dd($Campus);
        if ($cursos) {
            $data = array(
                array('semestre', 
            	      'anio', 
            	      'seccion',
            	      'asignatura_id',
            	      'docente_id'),

                array($cursos->semestre,
            	      $cursos->anio,
            	      $cursos->seccion,
            	      $cursos->asignaturas->nombre,
            	      $cursos->docentes->nombres),
            
            );

            Excel::create('Cursos' . $cursos->seccion, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

  }

}
