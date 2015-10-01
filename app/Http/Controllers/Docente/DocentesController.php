<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DocentesController extends Controller {

	
	public function index()
	{
		return view('Docentes.bienvenidosDocentes');
	}

	

	public function create(){}

    public function store(){}

	public function show($id){}

	public function edit($id){}

	public function update($id){}

    public function destroy($id){}

	public function horarios()
	{
		
		return view('Docentes.horario');
	}

	public function consultas()
	{
		
		return view('Docentes.consulta');
	}

}
