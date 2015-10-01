<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsuarioController extends Controller {

public function index()
	{
       //$result= Rol::paginate();
       $result=Rol::with('roles_usuarios')->get();


      //dd($result);

      return view('Administrador.RolUsuarioCrud.listaRolUsuario', compact('result'));
        /* $result=\DB::table('roles')
		->select('roles.*',
			'roles_usuarios.*'
			)
		//->join ('users_perfiles','users.id','=','users_perfiles.user_id') //enlace de tablas, informacion de la otra tabla
		->join('roles_usuarios','rol_id','=','roles_usuarios.rol_id')
		->get();

		dd($result); //se vea linddo
		return $result;*/
	}


	public function create()
	{
		return view('Administrador.crear');
	}

	
	public function store()
	{
		//se valida y se ingresa datos en la vista crear
		$result= new Rol($request::all());    //obtenos los datos y luego es llamado abajo

		$rules= array(                     //se utiliza un arrays asociativo
			'nombre'      => 'required',   //campo obligatorio
			'descripcion' => 'required',
			'rut'         => 'required' 
			);
        //Segundo metodo: es mas corto, prefiero el primer metodo


        //Primer metodo
        $v= Validator::make($data, $rules);

        if($v->fails())                 //si falla
        {
            return redirect()->back()    //de vuelta al formulario
            ->withErrors($v->errors())     //errores que da la validacion
            ->withInput();

           
        }
         
        //$result = Rol::create($data);
        //  $result->push();
         //$result->save();

         //$result=Rol::find(0);
          //$result->roles_usuarios()->create($data);
         //$result->save();
         $result= new Rol;
         $result->nombre      = $data['nombre'];
         $result->descripcion = $data['descripcion'];
         $result->save();

         $idRol= $result->id;
         $resultt= new RolUsuario;
         $resultt->rut    = $data['rut'];
         $resultt->rol_id = $idRol;
         $resultt->save(); 

       	 return redirect()->route('usuarios.store');
    
         //otra forma de hacerlo */
		//dd($request->all());
		//$result= new Rol(Request::all());  //obtener los datos
                          //graba al usuario
        //Session::flash('message', $result->nombre.' fue creado');
	}

	public function show($id)
	{
		//$usuario = Roles_usuarios::all();
		//return View::make('Administrador.usuario');
	}

	public function edit($id)
	{
	    $result =Rol::findOrFail($id);  //sirve para enonctrar un usuario
        $resultt=RolUsuario::where('rol_id', '=', $id)->firstOrFail();
        //$resultt= RolUsuario::where('rut','=','$id')->firstOrFail();
         //$result=Rol::with('roles_usuarios')->get();
        return view('Administrador.editar', compact('result', 'resultt'));
	}

	
    //esque el edit lo usas para la vista.
     //y el update deberias usarlo para la db.
	//diferencia es que findOrfail te devuelve una excepci[on que puedes controlar si lo necesita

	public function update(EditRolRequest $request, $id)
	{
      
	    $result = Rol::findOrFail($id);
	    $resultt= RolUsuario::where('rol_id', '=', $id)->firstOrFail();
		$result->fill(Request::all());
	    $resultt->fill(Request::all());
		$resultt->save();
		$result->save();
		
		return redirect()->route('usuarios.index');  //siempre index
      
	}


	public function destroy($id)
	{
		$result = Rol::find($id);
		$resultt= RolUsuario::where('rol_id', '=', $id)->find($id);
        // Rol::destroy($id);

		$result->delete();
		$resultt->delete();
		Session::flash('message',' fue eliminado');
	   return redirect()->route('usuarios.index');


	}

}
