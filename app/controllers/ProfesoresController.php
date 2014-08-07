<?php

class ProfesoresController extends \BaseController {

    /**
     * Display a listing of profesores
     *
     * @return Response
     */
    public function index()
    {
        $profesores = Profesor::all();

        return View::make('admin.profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        return View::make('profesores.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Alumno::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Alumno::create($data);

        return Redirect::route('profesores.index');
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

        return View::make('profesores.show', compact('post'));
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

        return View::make('profesores.edit', compact('post'));
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

        return Redirect::route('profesores.index');
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

        return Redirect::route('profesores.index');
    }

}