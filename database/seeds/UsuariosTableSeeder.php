++<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UsuariosTableSeeder extends Seeder {

	
	public function run()
	{
		$faker= Faker::create();


		for($i=0, $i<30, $i ++){

          \DB::table('roles')-> insert (array(
              
             'nombre'       =>$faker->name,
             'descripcion'  =>$faker->text,
             'type'         =>'usuarios'
             	));		


		 \DB::table('roles_usuarios')->insert(arrary(

                'rol_id'      =>$id, 
                'rut'         => $faker->number,
                'descripcion' => $faker->text
                ));
		}
	}

}
