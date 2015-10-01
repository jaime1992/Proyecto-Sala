<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Campus;
use App\Http\Requests\EditCampusRequest;

//use App\Http\Controllers\Excel;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CampusController extends Controller {


	public function index()
	{
		$campus = Campus::get(); // Cambiar esto, si la db es muy grande queda la escoba
		
		return view('Administrador.CampusCrud.listaCampus', compact('campus'));
		
	}

	public function create()
	{
		return view('Administrador.CampusCrud.crearCampus');
	}


	public function store()
    {
    	$data= Request::all();         //obtenos los datos y luego es llamado abajo

 

		$rules= array(                     //se utiliza un arrays asociativo
			'nombre'        => 'required|alpha_spaces|max:255|unique:campus',   
			'direccion'     => 'required|alpha_spaces_num|max:255',
			'latitud'       => 'required|numeric',
		    'longitud'      => 'required|numeric',   
			'descripcion'   => 'required|alpha_spaces_num|max:255',
			'rut_encargado' => 'required|valid_rut|numeric|min:7|max:8',
			);
        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();   
        }
        
        $campus = Campus::create($data);
        $campus->save();

        Session::flash('message', ''.$campus->nombre. ' fue creado con éxito');
        return redirect()->route('Administrador.campus.store');
	}



	public function edit($id)
	{
	    $campus = Campus::findOrFail($id);
		return view('Administrador.CampusCrud.editarCampus', compact('campus'));
	}

	public function update(EditCampusRequest $request, $id)
	{
	    $campus = Campus::findOrFail($id);
		$campus->fill(Request::all());
		$campus->save();
		
		Session::flash('message', ''.$campus->nombre. ' fue modificado con éxito');
		return redirect()->route('Administrador.campus.index');  //siempre index
	}


	public function destroy($id)
    {  
   	   //dd("eliminado: " . $id);

		$campus = Campus::find($id);
        // Rol::destroy($id);

		$campus->delete();
		Session::flash('message', ' '.$campus->nombre. ' fue eliminado');
	    return redirect()->route('Administrador.campus.index');
	}

       /* 
        GET: recupera recursos.
        POST: crea un recurso.
        PUT: modifica un recurso.
        DELETE: elimina un recurso.
       */

	
 
	/*public function index3()   //importar
	{
	     
		   \Excel::load('public/campus.xlsx'.$nombre,function($archivo)
			{
				$result = $archivo->get();    //leer todas las filas del archivo
				foreach($result as $key => $value)  
				{
					$var = new Campus();
					$var->fill([
						'nombre'         => $value->nombre,
						'direccion'      => $value->direccion,
						'latitud'        => $value->latitud,
						'longitud'       => $value->longitud,
						'descripcion'    => $value->descripcion,
						'rut_encargado'  => $value->rut_encargado
						]);
					$var->save();
				}
			})->get();

			Session::flash('message', 'Los campus fueron agregados exitosamente!');
	       return redirect()->route('campus.index');
	       //return redirect()->action('AdministradorController@get_campusList');
	}*/
}