<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration {

	
	public function up()
	{
		Schema::create('dias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
		});
	}

	
	public function down()
	{
		//
	}

}
