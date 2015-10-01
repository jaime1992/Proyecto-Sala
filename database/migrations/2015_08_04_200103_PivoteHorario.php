<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteHorario extends Migration {

	public function up(){

	Schema::create('periodo_sala', function ($table) {
          
            $table->integer('sala_id')->unsigned();
            $table->integer('periodo_id')->unsigned();
             $table->integer('curso_id')->unsigned();
            $table->date('fecha');

            $table->foreign('sala_id')->references('id')->on('salas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos');
               $table->foreign('curso_id')->references('id')->on('cursos');

            $table->primary(['sala_id', 'periodo_id']);

        });
}


    public function down()
    {
        Schema::drop('periodo_sala');
    }

}