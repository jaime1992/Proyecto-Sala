<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration {

public function up()
	{
		Schema::create('funcionarios', function(Blueprint $table)
		{
			 $table->increments('id'); //serial
			 $table->integer('departamento_id')->unsigned();  

			 $table->foreign('departamento_id')
			 ->references ('id')
			 ->on('departamentos')
			 ->onDelete('cascade');

			 $table->integer('rut')->unique();
             $table->string('nombres');
             $table->string('apellidos');
             

			  $table->timestamps();
			  $table->string('email')->unique();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('funcionarios');
	}
}
