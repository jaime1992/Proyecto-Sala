<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdministradorTableSeeder extends Seeder {

	
	public function run()
	{
		 public function run(){

		 	$id= \DB::table('roles')->insert(array(

                  'nombre'       =>'Jaime Quiñelen villar',
                  'Descripcion'  =>'Administrador de la pagina',
                  'type' => 'admi'

		 		));
		 }


		 //\DB::table('roles_usuarios')->insert(arrary(

		 	));
	}

}
