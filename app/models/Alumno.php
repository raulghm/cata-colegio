<?php

class Alumno extends \Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alumnos';

	public function informe_logros() {
		return $this->hasMany('InformeLogro');
	}
}