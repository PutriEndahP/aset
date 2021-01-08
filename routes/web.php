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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'MainController@index');
Route::post('/login/authenticate', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');

Route::group(['middleware' => ['auth']], function(){
	Route::get('/dashboard', 'MainController@dashboard');
	Route::get('/jenis_dokumen', 'AssetController@jenis_dokumen');
	Route::get('/kategori/{id_kategori?}', 'AssetController@kategori');
	Route::get('/forminput', 'AssetController@form_input');
	Route::post('/insertkategori','AssetController@insert');
	Route::post('/update_kategori','AssetController@update_kategori');
	Route::get('/list_data/{id_dokumen?}','AssetController@data_aset');
	Route::post('/save_aset','AssetController@simpan_data');
	Route::post('/update','AssetController@update_aset');
	Route::get('/view-attachment/preview/{folder?}/{file?}', 'AssetController@preview_attachment');
	Route::get('/forminput/{id_aset?}', 'AssetController@form_input');
	Route::get('/detail/{id_aset}', 'ReviewController@detail');
	Route::get('/eviden/{id_aset}', 'AssetController@eviden_upload');
	Route::post('/save', 'AssetController@save_eviden');

	// Route::get('/list', 'AssetController@list_data');
});

Route::group(['prefix' => 'user'], function(){
	
		Route::get('/{id_user?}', 'UserController@list_user');
		Route::post('/save', 'UserController@save');
		Route::post('/update_password', 'UserController@update_password');
		Route::get('/delete/{id}', 'UserController@hapus');
});