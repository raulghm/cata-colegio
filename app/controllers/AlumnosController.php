<?php

class AlumnosController extends \BaseController {

    /**
     * Display a listing of alumnos
     *
     * @return Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return View::make('admin.alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        return View::make('alumnos.create');
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

        return Redirect::route('alumnos.index');
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

        return View::make('alumnos.show', compact('post'));
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

        return View::make('alumnos.edit', compact('post'));
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

        return Redirect::route('alumnos.index');
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

        return Redirect::route('alumnos.index');
    }

}