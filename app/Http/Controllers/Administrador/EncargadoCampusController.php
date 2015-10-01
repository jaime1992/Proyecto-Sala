<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EncargadoCampusController extends Controller {

	
	public function index()
	{
		return view('EncargadoCampus.bienvenidoEncargadoCampus');
	}


   public function show($id)
	{
		
	}
	
	public function create()
	{
		//
	}

	
	public function store()
	{
		//
	}


	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{
		//
	}

	
	public function destroy($id)
	{
		//
	}

	

    public function ajustesSalas()
    {
       return view('EncargadoCampus.ajustesSalas');

    }

    public function asignarSalas()
	{
      return view('EncargadoCampus.asignarSalas');

	}

    public function ingresarDatosAcademicos ()
    {
      return view('EncargadoCampus.ingresarDatosAcademicos');
    }
}
