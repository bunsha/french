<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MapsController@index');


/************* CITIES ***********/
Route::get('admin/city', 'CitiesController@index');
Route::get('admin/city/create', 'CitiesController@create');
Route::post('admin/city/store', 'CitiesController@store');
Route::get('admin/city/{id}/delete', 'CitiesController@delete');
Route::get('admin/city/{id}/edit', ['as' => 'city.edit', 'uses' => 'CitiesController@edit']);
Route::post('admin/city/{id}/update', ['as' => 'city.update', 'uses' => 'CitiesController@update']);

/************* DISTRICTS ***********/

Route::post('admin/district/edit', ['as' => 'district.edit', 'uses' => 'CitiesController@districtEdit']);
Route::get('admin/district/{id}/delete', ['as' => 'district.delete', 'uses' => 'CitiesController@districtDelete']);

/*********** TYPES *************/

Route::get('admin/types', 'TypesController@index');
Route::get('admin/types/create', 'TypesController@create');
Route::post('admin/types/store', 'TypesController@store');
Route::get('admin/types/{id}/delete', 'TypesController@delete');
Route::get('admin/types/{id}/edit', ['as' => 'type.edit', 'uses' => 'TypesController@edit']);
Route::post('admin/city/{id}/update', ['as' => 'type.update', 'uses' => 'TypesController@update']);

/*********** MAPS *************/
Route::get('admin/city/maps/{string}', 'MapsController@getGeocode');
Route::get('maps/{string}', 'MapsController@store');

/*********** OBJETS *************/
Route::get('admin/objects/create/', 'ObjectsController@create');
Route::post('admin/objects/store/', 'ObjectsController@post');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
