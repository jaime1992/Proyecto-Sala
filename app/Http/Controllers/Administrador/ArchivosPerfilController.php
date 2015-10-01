<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\RolUsuario;
use App\Models\Rol;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
class ArchivosPerfilController extends Controller {


public function index() //masivos datos
	{
	  $perfil = RolUsuario::paginate();
        $data = array(
            array(
            	  'usuario_id',
            	  'rol_id'),
            );

        foreach($perfil as $per){
            $datos = array();
            array_push($datos,$per->usuarios->rut,
            	              $per->roles->nombre);
            
            array_push($data,$datos);
        }

        Excel::create('Perfiles', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
	}

	
	

}