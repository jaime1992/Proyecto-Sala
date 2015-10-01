<?php namespace App\Http\Controllers\Docente;

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


class DocenteController extends Controller {

	
	public function index()
	{
		return view('DOcente.bienvenido');
	}

	public function create()
	{
		//
	}

	
	public function store()
	{
		//
	}

	
	public function show($id)
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

}
