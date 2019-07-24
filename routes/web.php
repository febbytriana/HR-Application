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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//akun
Route::get('/akun/index', 'AkunController@index')->name('akun.index');
Route::get('/akun/create', 'AkunController@create')->name('akun.create');
Route::get('/akun/print', 'AkunController@print')->name('akun.print');
Route::post('/akun/store', 'AkunController@store')->name('akun.store');
Route::get('/akun/edit/{id}', 'AkunController@edit')->name('akun.edit');
Route::post('/akun/update', 'AkunController@update')->name('akun.update');
Route::post('/akun/kelola-akun', 'AkunController@updateakun')->name('akun.update-akun');
Route::get('/akun/destroy/{id}', 'AkunController@destroy')->name('akun.destroy');
//akun-pegawai
Route::get('/akunpegawai/indexpegawai', 'AkunController@indexpegawai')->name('akunpegawai.indexpegawai');
Route::get('/akunpegawai/createpegawai', 'AkunController@createpegawai')->name('akunpegawai.createpegawai');
Route::get('/akunpegawai/printpegawai', 'AkunController@printpegawai')->name('akunpegawai.printpegawai');
Route::post('/akunpegawai/storepegawai', 'AkunController@storepegawai')->name('akunpegawai.storepegawai');
Route::get('/akunpegawai/editpegawai/{id}', 'AkunController@editpegawai')->name('akunpegawai.editpegawai');
Route::post('/akunpegawai/updatepegawai', 'AkunController@updatepegawai')->name('akunpegawai.updatepegawai');
Route::post('/akunpegawai/kelola-akunpegawai', 'AkunController@updateakunpegawai')->name('akunpegawai.update-akunpegawai');
Route::get('/akunpegawai/destroypegawai/{id}', 'AkunController@destroypegawai')->name('akunpegawai.destroypegawai');
//pegawai
Route::get('/pegawai/index', 'PegawaiController@index')->name('pegawai.index');
Route::get('/pegawai/detail', 'PegawaiController@detail')->name('pegawai.detail');
Route::get('/pegawai/create', 'PegawaiController@create')->name('pegawai.create');
Route::get('/pegawai/print', 'PegawaiController@print')->name('pegawai.print');
Route::post('/pegawai/store', 'PegawaiController@store')->name('pegawai.store');
Route::get('/pegawai/edit/{id}', 'PegawaiController@edit')->name('pegawai.edit');
Route::post('/pegawai/update', 'PegawaiController@update')->name('pegawai.update');
Route::get('/pegawai/destroy/{id}', 'PegawaiController@destroy')->name('pegawai.destroy');
Route::get('/peringatan', function () {
    return view('peringatans/index');
});