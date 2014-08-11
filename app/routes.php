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
Route::get('informe-logros/curso/{curso}/{semestre?}', function($curso = null, $semestre = null)
{
	if ($curso)
		$alumnos = Alumno::where('id_curso', '=', $curso)->get();
	else
		$alumnos = Alumno::all();

	// $cursos = Curso::all();
	$asignaturas = Asignatura::all();

	return View::make('admin.informes.logros.curso')
		->with('alumnos', $alumnos)
		->with('cursos', Curso::lists('nombre', 'id'))
		->with('asignaturas', $asignaturas);
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

		for ($foo = 0; $foo < count($id_asignatura); $foo++)
		{
			$array_combinado[$id_asignatura[$foo]] = $values[$foo];
		}

		// combine asignatura array key + value
		// $array_values = array_combine($id_asignatura, $values);
		$array_combinado = serialize($array_combinado);
		// dd($array_combinado);

		$post->id_alumno = $id_alumno;
		$post->values = $array_combinado;
		$post->id_curso = Input::get('id_curso');
		$post->id_semestre = Input::get('id_semestre');

		$post->save();
	}



});
