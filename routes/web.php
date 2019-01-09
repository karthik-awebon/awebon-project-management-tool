<?php
use App\User;
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

Auth::routes();

Route::get('/', function(){
    return redirect('login');
});

/* USERS ROUTES*/


Route::middleware('auth')->group(function(){

	Route::get('create-userworkhours', 'UserWorkhourController@create')->name('create-userworkhours');

 	Route::post('store-userworkhours', 'UserWorkhourController@store')->name('store-userworkhours');

	Route::get('index-userworkhours', 'UserWorkhourController@index')->name('index-userworkhours');

	Route::post('index-userworkhours', 'UserWorkhourController@index')->name('index-userworkhours');

	Route::get('edit-userworkhours/{id}', 'UserWorkhourController@edit')->name('edit-userworkhours');

	Route::post('update-userworkhours', 'UserWorkhourController@update')->name('update-userworkhours');

	Route::get('delete-userworkhours/{id}', 'UserWorkhourController@delete')->name('delete-userworkhours');
	 

});
