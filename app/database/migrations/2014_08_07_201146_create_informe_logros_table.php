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
			$table->integer('id_semestre');
			$table->integer('id_alumno')->unsigned();
			$table->foreign('id_alumno')->references('id')->on('alumnos');
			$table->integer('id_curso')->unsigned();
			$table->foreign('id_curso')->references('id')->on('cursos');
			$table->integer('id_asignatura')->unsigned();
			$table->foreign('id_asignatura')->references('id')->on('asignaturas');
			$table->text('values');
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

