<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\alumnos;
use App\Models\user;

class AdminController extends Controller {

	
	public function index()
	{
		//$var=user::all();
	    //$var=user::has('alumnos')->get();
		//$var=user::with('alumnos')->orderBy('id','DESC')->get();
		//dd($var->toJson());
		return view('Administrador.bienvenidoAdministrador');
		
	}
  
	
	public function create()
	{
		return view('Administrador.cambiarperfil');
	}
 
     public function eliminar()
     {

     }
	
	public function store()
	{
		//validaciones
	}


	public function show($id)
	{
		//return view('Administrador.cambiarperfil');
	
	}

	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{

	}

	public function destroy($id)
	{
		//eliminar
	}

    public function usuarios()
    {
    	return view('Administrador.usuario');
    }
}
