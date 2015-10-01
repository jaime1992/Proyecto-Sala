<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Departamento;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;

class SubirArchivosFuncionariosController extends Controller {

	public function index()
     {
	  return \View::make('Administrador.FuncionarioCrud.crearFuncionarios');
     }

	 public function store(Request $request)
	 {
		  //dd('jajaja');
	 	  $file= $request->file('file'); 

		   if(is_null($request->file('file')))
		  {
		  	Session::flash('message', 'Seleccion el archivo');
		  	 return redirect()->back();

		  }
		  //obtenemos el campo file obtenido por el formulario
		   $nombre=$file->getClientOriginalName(); 

          //indicamos que queremos guardar un nuevo archivo en el disco local
		   \Storage::disk('local')->put($nombre, \File::get($file)); 
		    $falla = false;


		   $departamentos = $request->get('departamentos');
		 //  dd($departamentos);

		   \Excel::load('/storage/public/files/'.$nombre,function($archivo)  use (&$falla)	
			{
				$result = $archivo->get();  //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{

					$departamentos= Departamento::whereNombre($value->departamento_id)->pluck('id');
					if(is_null($departamentos))
					{ // El campus no existe, deberia hacer algo para mitigar esto, o retornarlo al usuario ...
						
					}


					$var = new Funcionario();
					$datos=[
						'rut'             => $value->rut,
						'nombres'         => $value->nombres,
						'apellidos'       => $value->apellidos,
						'email'           => $value->email,
						'departamento_id' => $departamentos,
						];
                       $validator = Validator::make($datos, Funcionario::storeRules());
					if($validator->fails()) {
						Session::flash('message', 'Los Funcionarios ya existen o el archivo ingresado no es valido');
						$falla = true;
					}
					else {
						$var->fill($datos);
						$var->save();
					}
			}
		
			})->get();
		   if($falla) { // Fallo la validacion de algun campus, retornar al index con mensaje
		   	return redirect()->route('Administrador.funcionarios.index');
		   }
		   \Storage::delete($nombre);

		  Session::flash('message', 'Los Docentes fueron agregados exitosamente!');
	       return redirect()->route('Administrador.funcionarios.index');
	       
	}
}
