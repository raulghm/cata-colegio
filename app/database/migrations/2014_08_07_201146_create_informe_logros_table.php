<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformeLogrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informe_logros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_alumno');
			$table->integer('id_curso');
			$table->integer('id_asignatura');
			$table->string('valor');
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
		Schema::drop('informe_logros');
	}

}

