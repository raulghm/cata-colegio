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

Route::get('/alumnos', function()
{
	return View::make('admin.alumnos.index');
});

Route::get('/cursos', function()
{
	return View::make('admin.cursos.index');
});
