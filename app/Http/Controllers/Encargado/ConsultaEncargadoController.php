<?php namespace App\Http\Controllers\Encargado;


use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

use App\Models\Campus;
use App\Models\Docente;
use App\Models\Periodo;
use App\Models\Sala;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class ConsultaEncargadoController extends Controller {

	

	public function index()
	{
      $campus = \DB::table('campus')->get();
      $bloques = \DB::table('periodos')->get();
			return view('Encargado.consultaEncargado')->with('campus',$campus)->with('bloques',$bloques);
	}

	
	
	public function store()
	{
    
    //dd(Request::all());

		 if(Request::ajax())
          {

          $datos=array(
          'id_campus' => (int)Request::input('campus'),
          'fecha' =>  Request::input('fecha'),
          'bloque' => Request::input('bloque'),
           );

          /*$join= \DB::table('salas')
            ->join('campus', 'salas.campus_id', '=', 'campus.id')
            ->join('periodo_sala', 'salas.id', '=', 'periodo_sala.sala_id')         
            ->select('nombre','descripcion','estado')
            ->where('periodo_sala.fecha',$datos['fecha'])
            ->where('periodo_sala.bloque_id',$datos['bloque'])
            ->where('salas.campus_id',$datos['id_campus'])
            ->get();*/

            $join = \DB::table('periodo_sala')
                    ->join('salas', 'periodo_sala.sala_id', '=', 'salas.id')
                    ->join('periodos', 'periodo_sala.periodo_id', '=', 'periodos.id')
                    ->where('salas.campus_id',$datos['id_campus'])
                    ->where('periodos.bloque',$datos['bloque'])
                    ->where('periodo_sala.fecha',$datos['fecha'])->get();

            //$join = \DB::table('salas')->get();

            return response()->json(array(
              'resultado' => $join
               ));


          }

	}
}
