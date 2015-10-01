<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Campus;
use App\Models\Periodo;
use App\Models\Sala;
use App\Models\Curso;
use App\Http\Requests\EditSalasRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;




use Carbon\Carbon;



class SalasAsignarController extends Controller {

	public function index()
	{
		$users = Curso::with('docentes.departamentos','asignaturas')->get();
    
		//dd($users);


        return view('Encargado.AsignarSala.listaAsignarSala', array(
           
              'periodo' =>    Periodo::lists('bloque', 'id'),
              'campus' =>     Campus::lists('nombre', 'id'),
              'cursos' =>     $users              
                
        ));

	}


	public function store()
	{
     if(Request::ajax())    //submit
    {       
        
        $msg = null;
        $people=array();

        $roles = Sala::find(Request::input('salas'))->periodos;
        $ids=Request::input("periodo");
      
     $i=0;    
     foreach($ids as $val) 
     {
  
       if($roles->contains($val))
       {
         $people[$i] = $val; 

        $msg="Existe Periodo asociado";
          
       }       
     $i++;
    }
     
   //si el arreglo no esta vacio entra
     if (!empty($people))
     {

      
             return response()->json(array(
              'resultado' =>  'EXISTE',
               'datos' => $people
           
               ));
     }
     else
     {

      $msg="exito insercion";
             $Sala=Sala::find(Request::input('salas'));
             $ids=Request::input("periodo");
             $curso=Request::input("curso");
             $Sala->periodos()->attach($ids,['fecha' => Carbon::now(),'curso_id' => $curso]); 

               return response()->json(array(
              'resultado' =>  'NO_EXISTE',
               'datos' => $people
           
               ));
     } 
   }

	}

	//GET CONSULTA
	
	public function show($id=null)   //llenar combot dependiente, si seleccion campus, me muestra sus salas !
	{ 
		     if(Request::ajax())
       {       


                  $ej = Request::input('id');

                  $Asignaturas= \DB::table('salas')
              ->where('campus_id',$ej)
              ->get();
             //no se porque da error usando eloquent
            // $Asignaturas=Asignaturas::where('departamento_id',$ej)->get());
           
            
          return response()->json(array(
              'asig' =>  $Asignaturas
               ));
      }

   }
	

/*
	public function getConsulta()
	{
     
     if(Request::ajax())
       {       


                  $ej = Request::input('id');

                  $Asignaturas= \DB::table('salas')
              ->where('campus_id',$ej)
              ->get();
             //no se porque da error usando eloquent
            // $Asignaturas=Asignaturas::where('departamento_id',$ej)->get());
           
            
          return response()->json(array(
              'asig' =>  $Asignaturas
               ));
      }
	}
	
*/


}
