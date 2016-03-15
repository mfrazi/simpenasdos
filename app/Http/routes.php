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
    Route::get('berandaadmin', ['uses' => 'BerandaController@admin', 'as' => 'berandaadmin']);

    //CRUD user (user yang dimaksud adalah dosen)
    Route::resource('dosen', 'UserController', ['except' => ['show', 'update', 'destroy']]);
    Route::post('dosen/{dosen}/update', ['uses' => 'UserController@update', 'as' => 'dosen.update']);
    Route::get('dosen/{dosen}/destroy', ['uses' => 'UserController@destroy', 'as' => 'dosen.destroy']);
});

Route::group(['middleware' => ['auth', 'role:dosen,superuser']], function(){
    Route::get('berandadosen', ['uses' => 'BerandaController@dosen', 'as' => 'berandadosen']);
});
