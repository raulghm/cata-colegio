<?php

class AsignaturasController extends \BaseController {

    /**
     * Display a listing of asignaturas
     *
     * @return Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();

        return View::make('admin.asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        return View::make('asignaturas.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Asignatura::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Asignatura::create($data);

        return Redirect::route('asignaturas.index');
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Asignatura::findOrFail($id);

        return View::make('asignaturas.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Asignatura::find($id);

        return View::make('asignaturas.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = Asignatura::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Asignatura::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $post->update($data);

        return Redirect::route('asignaturas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Asignatura::destroy($id);

        return Redirect::route('asignaturas.index');
    }

}