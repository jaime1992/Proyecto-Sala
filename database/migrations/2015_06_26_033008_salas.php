<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class salas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salas', function(Blueprint $table)
		{
			 $table->increments('id'); //bigserial
			 
			 $table->integer('campus_id')->unsigned();  

			 $table->foreign('campus_id')
			 ->references ('id')
			 ->on('campus')
			 ->onDelete('cascade');

		      $table->string('nombre')->unique();
		      $table->string('Tipo de sala');
		      $table->integer('capacidad');
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
		Schema::drop('salas');
}

}
