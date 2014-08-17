<?php

class InformeLogrosController extends \BaseController {

	/**
	 * Display a listing of informeLogros
	 *
	 * @return Response
	 */
	public function index()
	{
		$cursos = Curso::all();

		return View::make('admin.informes.logros.index', compact('cursos'));
	}

	// public function curso()
	// {
	// 	$alumnos = alumno::all();
	// 	$cursos = curso::all();
	// 	$asignaturas = asignatura::all();

	// 	return View::make('admin.informes.logros.curso', compact('alumnos', 'cursos', 'asignaturas'));
	// }

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('informeLogros.create');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $data = Input::all();

		// if ($query->num_rows() == 0)
		// {
		//   // Si no existe, insertar
		//   $this->db->insert('informe_ob_trans', $data);
		// }
		// else
		// {
		//   // Si existe, actualizar
		//   $this->db->where('id', $_POST['id'][$i]);
		//   $this->db->update('informe_ob_trans', $data);
		// }

		$max = count($_POST['id_alumno']);

		echo $max;

		// for ($i = 0; $i < $max; $i++)
		// {

		// }

		// InformeLogro::create($data);

		// return Redirect::route('informeLogros.index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Alumno::findOrFail($id);

		return View::make('informeLogros.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Alumno::find($id);

		return View::make('informeLogros.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Alumno::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Alumno::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$post->update($data);

		return Redirect::route('informeLogros.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Alumno::destroy($id);

		return Redirect::route('informeLogros.index');
	}

}