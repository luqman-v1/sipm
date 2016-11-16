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

Route::get('/',['as'=>'HomeIndex','uses'=>'HomeController@index']);
Route::get('/detail/{id}',['as'=>'detail','uses'=>'Article@detail']);
Route::auth();
Route::get('/panel',['as'=>'login','uses'=>'Admin@index']);
Route::get('/tambah',['as'=>'tambahKeluhan','uses'=>'Tambah@keluhan']);
Route::post('/kategori',['as'=>'tambahKategori','uses'=>'Kategori@tambah']);
Route::get('/cekkategori',['as'=>'lihatKategori','uses'=>'LihatKategori@lihat']);
Route::get('/formKategori',['as'=>'DaftarKategori','uses'=>'Kategori@tambahIndex']);
Route::resource('/add','CrudController');
Route::get('/edit/{id}',['as'=>'edit','uses'=>'Edit@edits']);
Route::put('/edit/{id}','Edit@postEdit');
Route::get('/hapus/{id}',['as'=>'delete','uses'=>'Delete@destroy']);
Route::get('/hapusCat/{id}',['as'=>'deleteCategory','uses'=>'LihatKategori@destroy']);
Route::get('/editCat/{id}',['as'=>'editCat','uses'=>'EditCat@edits']);
Route::put('/editCat/{id}','EditCat@postEdit');
Route::get('/maps/',['as'=>'maps','uses'=>'Maps@map']);
