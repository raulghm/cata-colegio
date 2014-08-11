<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlumnoInformeLogroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alumno_informe_logro', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_alumno')->unsigned()->index();
			$table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
			$table->integer('id_informe_logro')->unsigned()->index();
			$table->foreign('id_informe_logro')->references('id')->on('informe_logros')->onDelete('cascade');
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
		Schema::drop('alumno_informe_logro');
	}

}
