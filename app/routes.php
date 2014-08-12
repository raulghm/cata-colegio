<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/admin', function()
{
	return View::make('admin.index');
});

Route::resource('alumnos', 'AlumnosController');
Route::resource('cursos', 'CursosController');
Route::resource('asignaturas', 'AsignaturasController');
Route::resource('profesores', 'ProfesoresController');
Route::resource('informe-logros', 'InformeLogrosController');

// informe logros
Route::get('informe-logros/curso/{curso}/{semestre?}', function($curso = null, $semestre = 1)
{
	if ($semestre)
		$alumnos = Alumno::where('id_curso', '=', $curso)->get();
	else
		$alumnos = Alumno::all();

	$cursos = Curso::lists('nombre', 'id');

	if ($semestre)
	{
		$informe_logros = InformeLogro::where('id_curso', '=', $curso)->where('id_semestre', '=', $semestre)->get();
		// recuperar valores de notas serializados
		foreach ($informe_logros as $value) {
			$values = unserialize($value->values);
			if (is_array($values)) {
				$array_values[] = $values;
			}
		}
	}

	// var_dump($array_values);
	return Arrays::size($array_values);

	// $cursos = Curso::all();
	$asignaturas = Asignatura::all();

	// dd($alumnos);

	return View::make('admin.informes.logros.curso')
		->with('cursos', $cursos)
		->with('alumnos', $alumnos)
		->with('informe_logros', $informe_logros)
		->with('asignaturas', $asignaturas);
		// ->with('array_values', $array_values);
});

Route::post('informe-logros/store', function()
{
	$id_alumno = Input::get('id_alumno');
	$max = count($id_alumno);

	for ($i = 0; $i < $max; $i++)
	{
		$post = new InformeLogro;

		$id_alumno = Input::get('id_alumno')[$i];
		$values = Input::get('value')[$id_alumno];
		$id_asignatura = Input::get('id_asignatura')[$id_alumno];
		$array_combinado = array();

		for ($j = 0; $j < count($id_asignatura); $j++)
		{
			$array_combinado[$id_asignatura[$j]] = $values[$j];
		}

		// guardo valores id_asignatura + valor_asignatura
		$array_combinado = serialize($array_combinado);

		$post->id_alumno = $id_alumno;
		$post->values = $array_combinado;
		$post->id_curso = Input::get('id_curso');
		$post->id_semestre = Input::get('id_semestre');

		$post->save();
	}



});
