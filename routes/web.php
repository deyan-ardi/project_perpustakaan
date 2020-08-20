<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user_karyawan', 'DataController@karyawan')->name('karyawan');
Route::get('/kategori_buku', 'DataController@kategori_buku')->name('kategori_buku');
Route::get('/buku', 'DataController@buku')->name('buku');
Route::get('/peminjaman_buku', 'DataController@peminjaman_buku')->name('peminjaman_buku');
Route::get('/info', 'DataController@info')->name('info');
Route::get('/detail_buku/{id}', 'DataController@data_buku');

// Data Member
Route::post('/insert_new_member', 'DataController@insert_member')->name('insert_new_member');
Route::post('/proses_edit_member', 'DataController@proses_edit_member')->name('proses_edit_member');
Route::get('/user', 'DataController@user')->name('member');
Route::get('/ubah_member/{id}', 'DataController@edit_member');
Route::get('/hapus_member/{id}', 'DataController@hapus_member');

// Kategori
Route::post('/insert_new_kategori', 'DataController@insert_kategori')->name('insert_new_kategori');
Route::get('/ubah_kategori/{id}', 'DataController@edit_kategori');
Route::get('/hapus_kategori/{id}', 'DataController@hapus_kategori');
Route::post('/proses_edit_kategori', 'DataController@proses_edit_kategori')->name('proses_edit_kategori');
Route::get('/hapus_kategori/{id}', 'DataController@hapus_kategori');

// Buku
Route::post('/insert_new_buku', 'DataController@insert_buku')->name('insert_new_buku');
Route::get('/detail_buku/ubah_buku/{id}', 'DataController@edit_buku');
Route::get('/detail_buku/hapus_buku/{id}', 'DataController@hapus_buku');
Route::post('/proses_edit_buku', 'DataController@proses_edit_buku')->name('proses_edit_buku');

// Peminjaman
Route::post('/insert_new_peminjaman', 'DataController@insert_peminjaman')->name('insert_new_peminjaman');
Route::get('/ubah_status/{id}', 'DataController@ubah_status');
Route::get('/hapus_peminjaman/{id}', 'DataController@hapus_peminjaman');

// User
Route::get('/ubah_user', 'DataController@ubah_user')->name('ubah_user');
Route::post('/proses_edit_user', 'DataController@proses_edit_user')->name('proses_edit_user');