<?php

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@index')->name('admin');


/* PROJECTS ROUTES*/

Route::get('create-projects', 'ProjectsController@create')->name('create-projects');

Route::post('store-projects', 'ProjectsController@store')->name('store-projects');

Route::get('projects', 'ProjectsController@index')->name('projects');

Route::get('details-projects/{id}', 'ProjectsController@show')->name('details-projects');
Route::post('details-projects/{id}', 'ProjectsController@show')->name('details-projects');

Route::get('projects/{id}', 'ProjectsController@edit')->name('projects/{id}');

Route::post('update-projects', 'ProjectsController@update')->name('update-projects');

Route::get('delete-projects/{id}', 'ProjectsController@delete')->name('delete-projects/{id}');



/* PROJECTS ROUTES*/

Route::get('create-workhours', 'WorkhoursController@create')->name('create-workhours');

Route::post('store-workhours', 'WorkhoursController@store')->name('store-workhours');

Route::get('workhours', 'WorkhoursController@index')->name('workhours');
Route::post('workhours', 'WorkhoursController@index')->name('workhours');

Route::get('workhours/{id}', 'WorkhoursController@edit')->name('workhours/{id}');

Route::post('update-workhours', 'WorkhoursController@update')->name('update-workhours');

Route::get('delete-workhours/{id}', 'WorkhoursController@delete')->name('delete-workhours/{id}');

Route::get('details-workhours', 'WorkhoursController@show')->name('details-workhours');


/* RESOURCE ROUTES*/

Route::get('create-resource', 'ResourceController@create')->name('create-resource');

Route::post('store-resource', 'ResourceController@store')->name('store-resource');

Route::get('index-resource', 'ResourceController@index')->name('index-resource');

Route::get('edit-resource/{id}', 'ResourceController@edit')->name('edit-resource/{id}');

Route::post('update-resource', 'ResourceController@update')->name('update-resource');

Route::get('delete-resource/{id}', 'ResourceController@delete')->name('delete-resource/{id}');

Route::get('details-resource/{id}', 'ResourceController@show')->name('details-resource');

Route::post('details-resource/{id}', 'ResourceController@show')->name('details-resource');
