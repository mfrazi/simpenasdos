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

Route::get('/', ['uses' => 'BerandaController@umum', 'as' => 'berandaumum']);

Route::get('daftar', ['uses' => 'PendaftaranController@create', 'as' => 'daftar.create']);
Route::post('daftar', ['uses' => 'PendaftaranController@store', 'as' => 'daftar.store']);

Route::get('sertifikat', ['uses' => 'SertifikatController@index', 'as' => 'sertifikat.index']);
Route::post('sertifikat', ['uses' => 'SertifikatController@submitNRP', 'as' => 'sertifikat.submitNRP']);



Route::get('login', 'AuthController@showLogin');
Route::post('login', ['uses' => 'AuthController@doLogin', 'as' => 'login']);
Route::get('logout', ['uses' => 'AuthController@doLogout', 'as' => 'logout']);



Route::group(['middleware' => ['auth', 'role:admin,kaprodi,dosen']], function(){
    Route::get('selfedit', ['uses' => 'UserController@selfedit', 'as' => 'selfedit']);
    Route::post('dosen/{dosen}/update', ['uses' => 'UserController@update', 'as' => 'dosen.update']);
});


Route::group(['middleware' => ['auth', 'role:kaprodi,dosen']], function(){
    Route::get('berandadosen', ['uses' => 'BerandaController@dosen', 'as' => 'berandadosen']);
    Route::get('pilihasdos', ['uses' => 'PilihAsdosController@index', 'as' => 'pilihasdos.index']);
    Route::get('getregistrant/{id}', ['uses' => 'PilihAsdosController@getregistrant', 'as' => 'pilihasdos.registrant']);
    Route::post('pilihasdos', ['uses' => 'PilihAsdosController@update', 'as' => 'pilihasdos.update']);
    Route::get('transkrip/{id}', ['uses' => 'PilihAsdosController@trankrip', 'as' => 'pilihasdos.trankrip']);
});

Route::group(['middleware' => ['auth', 'role:admin,superuser']], function(){
    Route::get('berandaadmin', ['uses' => 'BerandaController@admin', 'as' => 'berandaadmin']);

    Route::resource('dosen', 'UserController', ['except' => ['show', 'update', 'destroy']]);
    Route::get('dosen/{dosen}/destroy', ['uses' => 'UserController@destroy', 'as' => 'dosen.destroy']);

    Route::resource('kelas', 'KelasController', ['except' => ['update', 'destroy']]);
    Route::post('kelas/update', ['uses' => 'KelasController@update', 'as' => 'kelas.update']);

    Route::resource('pengumuman', 'PengumumanController', ['except' => ['show', 'update', 'destroy']]);

    Route::get('pengaturan', ['uses' => 'PengaturanController@index', 'as' => 'pengaturan']);
    Route::post('pengaturan', ['uses' => 'PengaturanController@update', 'as' => 'pengaturan.update']);

    Route::get('sertifikat/admin', ['uses' => 'SertifikatController@showOrder', 'as' => 'sertifikat.showOrder']);
    Route::get('sertifikat/admin/print/{id}', ['uses' => 'SertifikatController@printCertificate', 'as' => 'sertifikat.print']);

    Route::get('asisten', ['uses' => 'PilihAsdosController@showAssistant', 'as' => 'asisten.show']);
    Route::get('asisten/tambah', ['uses' => 'PilihAsdosController@showCloseRegForm', 'as' => 'asisten.showCloseRegForm']);
    Route::post('asisten/tambah', ['uses' => 'PilihAsdosController@addAssistant', 'as' => 'asisten.addAssistant']);

});

Route::get('sertifikat/{nrp}', ['uses' => 'SertifikatController@showConfirmation', 'as' => 'sertifikat.showConfirmation']);
Route::post('sertifikat/{nrp}', ['uses' => 'SertifikatController@order', 'as' => 'sertifikat.order']);