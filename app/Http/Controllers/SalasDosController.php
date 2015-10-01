<?php namespace App\Http\Controllers;

//use Illuminate\Http\Request;//para usarlo como inyeccion de dependencias  
use Auth;
use Request;
//use App\Http\Requests\LoginForm;//añadimos nuestro validador

use App\Models\Campus;
use App\Models\TipoSala;
use App\Models\Sala;
use App\Models\Periodo;
use App\Models\Curso;
use Carbon\Carbon;

class SalasDosController extends Controller {

  


   public function getIndex()
   {
     
        return view('Salas.index', array(
            'page_title' => 'Salas',
              'campus' =>    Campus::lists('nombre', 'id')    
                
        ));

    }

    public function getCreate()
    {
      
      dd("entra");

    }

    public function getAsignar()
    {
     
   
        $users = Cursos::with('docentes.departamentos','asignaturas')->get();


        return view('Encargado.AsignarSala.listaAsignarSala', array(
            'page_title' => 'Asignar Salas',
              'periodo' =>    Periodo::lists('bloque', 'id'),
              'campus' =>     Campus::lists('nombre', 'id'),
              'cursos' =>     $users              
                
        ));

    }


  public function postStoreAsignar()
  {


    if(Request::ajax())
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




      public function postStore()

    {
      
      dd("entra");

    }


      public function postEdit()
    {  

      $id_salas=Request::input('salas');

      $salas =  $this->salas->find($id_salas);      
     
        return view('Salas.edit', array(
            'page_title' => 'EditarSalas',
            'salas' => $salas,
            'campus' => Campus::lists('nombre', 'id'),
            'tiposala' => Tipo_Salas::lists('nombre', 'id')

           

        )); 

    }

    public function putUpdate()
    {  
    
      //dd(Request::all());

    $datos = array(
          'nombre'=>Request::input('nombre'),
           'codigo'=>Request::input('codigo'), 
            'descripcion'=>Request::input('descripcion'),
           'id' => Request::input('id'),
          
             );

  $claves= array(
      
      'id' => Request::input('id'),

    );


  $largo = count($claves['id']);

  for ($i = 0; $i < $largo; $i++) 
  {
    
     $prueba=array(
        'nombre'=> $datos['nombre'][$i],
        'codigo' => $datos['codigo'][$i],
        'descripcion' => $datos['descripcion'][$i],
      );

     
     $this->asignatura->update($prueba,$claves['id'][$i]);
  }
      
        return redirect('asignaturas')->with('message', 'Post updated');

    }


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
    

    public function postExcel()
  {
    //Request::file
    $path = Request::file('archivito');
    $objPHPExcel = \PHPExcel_IOFactory::load($path);
    //$objPHPExcel = new \PHPExcel($path);
    $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();


      for ($row = 1; $row <= $highestRow; ++$row) 
      {
         //var_dump($objWorksheet->getCellByColumnAndRow(1, $row));
        $nombre = $objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
        
        $aux = Sala::where('nombre', '=', $nombre)->first();

        if(!$aux){
        $sala = new Sala;
        $auxiliar_campus = $objPHPExcel->getActiveSheet()->getCell('A'.$row)->getValue();// macul
        $sala->campus_id = "selec id where nombre=$";
        $sala->tipo_sala_id = $objPHPExcel->getActiveSheet()->getCell('B'.$row)->getValue();
        $sala->nombre = $objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
        $sala->descripcion= $objPHPExcel->getActiveSheet()->getCell('D'.$row)->getValue();
        $sala->save();
        }else{
        $sala = Sala::where('nombre', '=', $nombre)->first();
        $sala->campus_id = $objPHPExcel->getActiveSheet()->getCell('A'.$row)->getValue();
        $sala->tipo_sala_id = $objPHPExcel->getActiveSheet()->getCell('B'.$row)->getValue();
        $sala->nombre = $objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
        $sala->descripcion= $objPHPExcel->getActiveSheet()->getCell('D'.$row)->getValue();
        $sala->save();
        }

    }

        //recordar manejar los errores

        return redirect()->back();
  }



 
}