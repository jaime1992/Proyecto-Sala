<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Docente;
use App\Http\Requests\EditDocentesRequest;
//use App\Http\Controllers\Excel;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class DocentesAController extends Controller {


	public function index()
	{
		$docentes=Docente::with('departamentos')->get();
	    
		return view('Administrador.DocenteCrud.listaDocente', compact('docentes')); 
	}

	
	public function create()
	{
		
		$departamentos=Departamento::lists('nombre','id');
		return view('Administrador.DocenteCrud.crearDocente')->with('departamentos',$departamentos);
	}


	public function store()
	{
		$data= Request::only('rut','nombres','apellidos','email','departamento_id');
         // dd($data);

         $rules= array(    //se utiliza un arrays asociativo, asociativo que es?
            'rut'         => 'required|valid_rut|numeric|unique:docentes|min:7|max:8',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
			'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
			'apellidos'   => 'required|alpha_spaces|max:255',
			'email'       => 'required|email|valid_email|unique:docentes|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $docentes=Docente::create($data);
         $docentes->save();
         
         Session::flash('message', 'El docente '. $docentes->nombres. ' fue creado con éxito');
       	 return redirect()->route('Administrador.docente.store'); 
	}

	

	
	public function edit($id)
	{
		
		$docentes = Docente::findOrFail($id);
		$departamentos=Departamento::lists('nombre','id');

       return view('Administrador.DocenteCrud.editarDocente', compact('docentes','departamentos'));
    }

	public function update(EditDocentesRequest $request, $id)
	{
     $docentes= Docente::findOrFail($id);
	 $docentes->fill(Request::all());
	 $docentes->save();
	Session::flash('message', 'El docente '. $docentes->nombres. ' fue modificado con éxito');
	return redirect()->route('Administrador.docente.index');  
	}

	
	public function destroy($id)
	{
	    $docentes = Docente::find($id);
		$docentes->delete();
		Session::flash('message', 'El docente '. $docentes->nombres. ' de rut ' .$docentes->rut. ' fue eliminado');
	    return redirect()->route('Administrador.docente.index');
	}
	
    

}

