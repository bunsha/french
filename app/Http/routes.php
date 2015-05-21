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



Route::get('admin/city', 'CitiesController@index');
Route::get('admin/city/create', 'CitiesController@create');
Route::post('admin/city/store', 'CitiesController@store');
Route::get('admin/city/{id}/delete', 'CitiesController@delete');
Route::get('admin/city/{id}/edit', ['as' => 'city.edit', 'uses' => 'CitiesController@edit']);
Route::post('admin/city/{id}/update', ['as' => 'city.update', 'uses' => 'CitiesController@update']);
Route::post('admin/district/edit', ['as' => 'district.edit', 'uses' => 'CitiesController@districtEdit']);
Route::get('admin/district/{id}/delete', ['as' => 'district.delete', 'uses' => 'CitiesController@districtDelete']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
