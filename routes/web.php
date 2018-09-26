<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* PROJECTS ROUTES*/

Route::get('create-projects', 'ProjectsController@create')->name('create-projects');

Route::post('store-projects', 'ProjectsController@store')->name('store-projects');

Route::get('projects', 'ProjectsController@index')->name('projects');

Route::get('details-projects/{id}', 'ProjectsController@show')->name('details-projects');

Route::get('projects/{id}', 'ProjectsController@edit')->name('projects/{id}');

Route::post('update-projects', 'ProjectsController@update')->name('update-projects');

Route::get('delete-projects/{id}', 'ProjectsController@delete')->name('delete-projects/{id}');



/* PROJECTS ROUTES*/

Route::get('create-workhours', 'WorkhoursController@create')->name('create-workhours');

Route::get('store-workhours', 'WorkhoursController@store')->name('store-workhours');

Route::get('workhours', 'WorkhoursController@index')->name('workhours');

Route::get('edit-workhours', 'WorkhoursController@edit')->name('edit-workhours');

Route::get('details-workhours', 'WorkhoursController@show')->name('details-workhours');


