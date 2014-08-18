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

	// if ( !(isset($informe_logros)) ) {
	// 	$informe_logros = "";
	// }

	if ( !(isset($array_values)) ) {
		$array_values = array();
	}

	// var_dump($array_values);
	// // return Arrays::size($array_values);
	// var_dump(Arrays::pluck($array_values, 1));

	// $cursos = Curso::all();
	$asignaturas = Asignatura::all();

	// dd($alumnos);

	return View::make('admin.informes.logros.curso', array('array_values' => $array_values))
		->with('cursos', $cursos)
		->with('alumnos', $alumnos)
		->with('informe_logros', $informe_logros->toArray())
		->with('asignaturas', $asignaturas);
});

Route::post('informe-logros/store', function()
{
	$id_alumno = Input::get('id_alumno');
	$max = count($id_alumno);

	for ($i = 0; $i < $max; $i++)
	{
		$informe_id = Input::get('id_informe')[$i];
		$query = InformeLogro::find($informe_id);

		if ( $query )
		{
			$id_alumno = Input::get('id_alumno')[$i];
			$value = Input::get('value')[$id_alumno];
			$id_asignatura = Input::get('id_asignatura')[$id_alumno];
			unset($array_combinado);
			$array_combinado = array();

			for ($j = 0; $j < count($id_asignatura); $j++)
			{
				$array_combinado[$id_asignatura[$j]] = $value[$j];
			}

			// guardo valores id_asignatura + valor_asignatura
			$array_combinado = serialize($array_combinado);

			$query->id_alumno = $id_alumno;
			$query->values = $array_combinado;
			$query->id_curso = Input::get('id_curso');
			$query->id_semestre = Input::get('id_semestre');

			$query->save();
		}
		else
		{
			$query = new InformeLogro;

			$id_alumno = Input::get('id_alumno')[$i];
			$value = Input::get('value')[$id_alumno];
			$id_asignatura = Input::get('id_asignatura')[$id_alumno];
			unset($array_combinado);
			$array_combinado = array();

			for ($j = 0; $j < count($id_asignatura); $j++)
			{
				$array_combinado[$id_asignatura[$j]] = $value[$j];
			}

			// guardo valores id_asignatura + valor_asignatura
			$array_combinado = serialize($array_combinado);

			$query->id_alumno = $id_alumno;
			$query->values = $array_combinado;
			$query->id_curso = Input::get('id_curso');
			$query->id_semestre = Input::get('id_semestre');

			$query->save();
		}


	}
});

Route::get('test', function(){
	return PDF::loadHTML('<strong>Hello World</strong>')->lowquality()->pageSize('A2')->download();
});

Route::get('pdf', function()
{
	// $data = array();

	// function asignatura_data($array, $search, $campo)
	// {
	// 	foreach ($array as $value) {
	// 		if (array_search($search, $value))
	// 		{
	// 			return $value[$campo];
	// 		}
	// 	}
	// }

	$data['alumnos'] = Alumno::all();
	$data['asignaturas'] = Asignatura::all();

	// echo asignatura_data($asignaturas->toArray(), 2, 'nombre');

	// var_dump($informe_logros);
	// foreach ($informe_logros as $value) {
	// 	var_dump($value->id_alumno);
	// }

	// $pdf = PDF::loadView('admin.informes.logros.pdf-alumno'. $data);
	// $pdf->loadHTML($view);
	// return $pdf->download('test.pdf');

	ini_set("memory_limit","750M");

	$view = View::make('admin.informes.logros.pdf-alumno')->with('data', $data);
	$pdf = App::make('dompdf');
	$pdf->loadHTML($view);
	return $pdf->download('informe.pdf');

	// return View::make('admin.informes.logros.pdf-alumno')->with('data', $data);
});

