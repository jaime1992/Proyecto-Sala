<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Sala;
use App\Models\Periodo;
use App\Models\Curso;
use App\Models\Horario;
use App\Http\Requests\EditHorariosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



class HorariosController extends Controller {


	public function index()
	{
		$horarios=Horario::with('salas','periodos','cursos')->get();
		return view('Administrador.HorarioCrud.listaHorario', compact('horarios'));
	}


	public function create()
	{
		$salas=Sala::lists('nombre','id');
	    $periodos=Periodo::lists('bloque','id');
	    $cursos=Curso::lists('seccion','id');
		return view('Administrador.HorarioCrud.crearHorario')
		->with('salas', $salas)
		->with('periodos', $periodos)
		->with('cursos', $cursos);
		
		//Trying to get property of non-object a veces me sale
		//se que viene de $asig->departamentos->nombre, pero no se que mierda!!!
		// y era porque tenia mala la funcion departamentos en el modelo de asignaturas
		//me faltaba el 'departamento_id', 'id'


		//sInvalid argument supplied for foreach()
	}


	public function store()
	{
		
		$data= Request::only('date','sala_id','periodo_id','curso_id');
        

         $rules= array(                     //se utiliza un arrays asociativo
         	'date'       =>'required'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $horarios=Horario::create($data);
         $horarios->save();
         Session::flash('message', 'El Horario de la fecha '. $horarios->fecha. ' fue creado con éxito');
       	 return redirect()->route('Administrador.horarios.store'); 
	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		$horarios = Horario::findOrFail($id);
	    $salas=Sala::lists('nombre','id');
	    $periodos=Periodo::lists('bloque','id');
	    $cursos=Curso::lists('seccion','id');

       return view('Administrador.HorarioCrud.editarHorario', compact('horarios','salas','periodos','cursos'));
    }

	public function update(EditHorariosRequest $request, $id)
	{
     $horarios= Horario::findOrFail($id);
	 $horarios->fill(Request::all());
	 
	 $horarios->save();
	Session::flash('message', 'El Horario de la fecha '. $horarios->fecha. ' fue modificado con éxito');
	return redirect()->route('Administrador.horarios.index');  
	}

	
	public function destroy($id)
	{
	    $horarios = Horario::find($id);
		$horarios->delete();
		Session::flash('message', 'El Horario de la fecha '. $horarios->fecha. ' fue eliminado');
	    return redirect()->route('Administrador.horarios.index');
	}
}
