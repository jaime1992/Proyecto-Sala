<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campus', function(Blueprint $table)
		{
			$table->increments('id');  //serial
                        $table->string('nombre')->unique();
			$table->string('direccion'); 
			$table->string('latitud')->unique(); //double precision
			$table->string('longitud')->unique(); //double precision
			$table->integer('rut_encargado'); 

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campus');
	}

}