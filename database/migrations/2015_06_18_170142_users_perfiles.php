<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersPerfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_perfiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipoUsuario');
			$table->string('descripcion');

			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')
			->references('id')
			->on('users')
			->onDelete('cascade');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_perfiles');
	}

}