<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration {

	public function up()
	{
		Schema::create('departamentos', function(Blueprint $table)
		{
			$table->increments('id');  //serial
			 $table->string('nombre')->unique();

               
             $table->integer('facultad_id');  

			  $table->foreign('facultad_id')
			 ->references ('id')
			 ->on('facultades')
			 ->onDelete('cascade');

			  $table->text('descripcion'); //text
			
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
		Schema::drop('departamentos');
	}

}
