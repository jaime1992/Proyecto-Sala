<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facultades', function(Blueprint $table)
		{
			$table->increments('id'); //serial
			 $table->string('nombre')->unique();


             $table->integer('campu_id')->unsigned();  

			  $table->foreign('campu_id')
			 ->references ('id')
			 ->on('campus')
			 ->onDelete('cascade');


			$table->string('descripcion'); //text
			
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
		Schema::drop('facultades');
	}

}
