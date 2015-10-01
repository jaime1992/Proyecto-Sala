<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Funcionario;
use App\Http\Requests\EditFuncionariosRequest;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class FuncionariosController extends Controller {


	public function index()
	{
		$funcionarios=Funcionario::with('departamentos')->get();
	    
		return view('Administrador.FuncionarioCrud.listaFuncionarios', compact('funcionarios')); 
	}

	public function create()
	{
		$departamentos=Departamento::lists('nombre','id');
		return view('Administrador.FuncionarioCrud.crearFuncionarios')->with('departamentos',$departamentos);
	}


	public function store()
	{
		$data= Request::only('rut','nombres','apellidos','email','departamento_id');
         // dd($data);

         $rules= array(    //se utiliza un arrays asociativo, asociativo que es?
            'rut'         => 'required|valid_rut|numeric|unique:funcionarios|min:7|max:8',  //tengo que ponerle numeric, pero no me pesca los puntos y el guion       
			'nombres'     => 'required|alpha_spaces|max:255',          //alpha, me webea el espacio, ej: ing  madera
			'apellidos'   => 'required|alpha_spaces|max:255',
			'email'       => 'required|email|valid_email|unique:funcionarios|max:255'
			); 
      
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        } 

         $funcionarios=Funcionario::create($data);
         $funcionarios->save();
         
         Session::flash('message', 
         	           'El Funcionario '. $funcionarios->nombres. ' fue creado con éxito');
       	 return redirect()->route('Administrador.funcionarios.store'); 
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		
		$funcionarios = Funcionario::findOrFail($id);
		$departamentos=Departamento::lists('nombre','id');

       return view('Administrador.FuncionarioCrud.editarFuncionarios', compact('funcionarios','departamentos'));
    }

	public function update(EditFuncionariosRequest $request, $id)
	{
     $funcionarios= Funcionario::findOrFail($id);
	 $funcionarios->fill(Request::all());
	 $funcionarios->save();


	Session::flash('message',  'El funcionaro '. $funcionarios->nombres. ' fue modificado con éxito ');
	return redirect()->route('Administrador.funcionarios.index');  
	}

	
	public function destroy($id)
	{
	    $funcionarios = Funcionario::find($id);
		$funcionarios->delete();
		Session::flash('message',
		               'El funcionaro '.  $funcionarios->nombres. '  de rut ' .$funcionarios->rut. ' fue eliminado');
	    return redirect()->route('Administrador.funcionarios.index');
	}
	

}

