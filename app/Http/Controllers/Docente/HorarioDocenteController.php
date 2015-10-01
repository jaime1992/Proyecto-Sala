<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HorarioDocenteController extends Controller {

	
	public function index()
	{
		/*$join =  \DB::table('cursos')
		         ->join('periodo_sala', 'cursos.id', '=','periodo_sala.curso_id')
				 ->join('salas', 'periodo_sala.sala_id', '=','salas.id')
				 ->join('periodos', 'periodo_sala.periodo_id', '=','periodos.id')
				 ->join('asignaturas','cursos.asignatura_id','=','asignaturas.id')
				 ->where('cursos.docente_id', '=', '1') //debe cambiar el id del estudiante
			     ->select('salas.nombre as sala','periodos.bloque','periodos.inicio','periodos.fin','asignaturas.nombre')
				 ->paginate();

		$join2 =  \DB::table('roles_usuarios')
		                    ->join('roles','roles_usuarios.rol_id','=','roles.id')
                            ->where('roles_usuarios.usuario_rut','=', \Auth::user()->rut)
                            ->select('roles.*','roles_usuarios.*')
                            ->lists('roles.nombre','roles.nombre'); 		 

				 dd(compact('datos_horario','var'));

		return view('DOcente.horarioDocente'); */

		$datos_horario  = Asignatura_cursada::join('horarios', 'asignaturas_cursadas.curso_id', '=','horarios.curso_id')
				->join('salas', 'horarios.sala_id', '=','salas.id')
				->join('periodos', 'horarios.periodo_id', '=','periodos.id')
				->join('cursos', 'horarios.curso_id', '=','cursos.id')
				->join('asignaturas','cursos.asignatura_id','=','asignaturas.id')
				->join('estudiantes','asignaturas_cursadas.estudiante_id','=','estudiantes.id')
				->where('estudiantes.rut','=',\Auth::user()->rut) 
				->select('salas.nombre as sala','periodos.bloque','periodos.inicio','periodos.fin','asignaturas.nombre')
				->paginate();
	}

	
	public function create()
	{
		//
	}

	
	public function store()
	{
		//
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{
		//
	}

	
	public function destroy($id)
	{
		//
	}

}
