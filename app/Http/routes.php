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

Route::get('login', 'AuthController@showLogin');
Route::post('login', ['uses' => 'AuthController@doLogin', 'as' => 'login']);
Route::get('logout', ['uses' => 'AuthController@doLogout', 'as' => 'logout']);

Route::group(['middleware' => ['auth', 'role:admin,superuser']], function(){
    Route::get('/dosen', ['uses' => 'UserController@index', 'as' => 'dosen']);
    Route::get('/tambahdosen', ['uses' => 'UserController@create', 'as' => 'tambahdosen']);
    Route::post('/tambahdosen', ['uses' => 'UserController@store', 'as' => 'storedosen']);
    Route::get('/ubahdosen/{id}', ['uses' => 'UserController@edit', 'as' => 'ubahdosen']);
    Route::post('/ubahdosen', ['uses' => 'UserController@update', 'as' => 'updatedosen']);
    Route::post('/hapusdosen/{id}', ['uses' => 'UserController@destroy', 'as' => 'hapusdosen']);
});
