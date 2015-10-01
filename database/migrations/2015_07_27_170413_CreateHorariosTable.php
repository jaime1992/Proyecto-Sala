<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration {

	public function up()
	{
		Schema::create('horarios', function(Blueprint $table)
		{
			  $table->increments('id');  //bigserial
			  $table->date('fecha')->unique();
			 
			 $table->integer('sala_id')->unique(); //bigint 

			 $table->foreign('sala_id')->unique()
			 ->references ('id')
			 ->on('salas')
			 ->onDelete('cascade');

			 $table->integer('periodo_id')->unique();  

			 $table->foreign('periodo_id')
			 ->references ('id')
			 ->on('periodos')
			 ->onDelete('cascade');

	          $table->integer('curso_id')->unsigned();  //bigint

			 $table->foreign('curso_id')
			 ->references ('id')
			 ->on('cursos')
			 ->onDelete('cascade');


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
		Schema::drop('horarios');
    }
}
