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
Route::get('/pegawai/detail/{id_pegawai}', 'PegawaiController@detail')->name('pegawai.detail');
Route::get('/pegawai/create', 'PegawaiController@create')->name('pegawai.create');
Route::get('/pegawai/print', 'PegawaiController@print')->name('pegawai.print');
Route::post('/pegawai/store', 'PegawaiController@store')->name('pegawai.store');
Route::get('/pegawai/edit/{id_pegawai}', 'PegawaiController@edit')->name('pegawai.edit');
Route::post('/pegawai/update/{id_pegawai}', 'PegawaiController@update')->name('pegawai.update');
Route::get('/pegawai/hapus/{id_pegawai}', 'PegawaiController@destroy')->name('pegawai.hapus');

Route::get('/pegawai/destroy/{id_pegawai}', 'PegawaiController@destroy')->name('pegawai.destroy');
//Surat SP

Route::get('/surat-sp/index', 'SPController@index')->name('sp.index');
Route::get('/surat-sp/create', 'SPController@create')->name('sp.create');
Route::post('/surat-sp/store', 'SPController@store')->name('sp.store');
Route::get('/surat-sp/edit/{id_sp}', 'SPController@edit')->name('sp.edit');
Route::post('/surat-sp/update/{id_sp}', 'SPController@update')->name('sp.update');
Route::get('/surat-sp/hapus/{id_sp}', 'SPController@destroy')->name('sp.hapus');
Route::get('/surat-sp/cetak_pdf', 'SPController@cetak_pdf')->name('sp.cetak_pdf');
Route::get('/surat-sp/cetak_pdf_id/{id_surat}', 'SPController@cetak_pdf_id')->name('sp.cetak_pdf_id');

//Jabatan
Route::get('/jabatan/index', 'JabatanController@jabatan')->name('jabatan.index');
Route::get('/jabatan/create', 'JabatanController@create')->name('jabatan.create');
Route::post('/jabatan/store', 'JabatanController@store')->name('jabatan.store');
Route::get('/jabatan/edit/{id_jabatan}', 'JabatanController@edit')->name('jabatan.edit');
Route::post('/jabatan/update/{id_jabatan}', 'JabatanController@update')->name('jabatan.update');
Route::get('/jabatan/hapus/{id_jabatan}', 'JabatanController@destroy')->name('jabatan.hapus');

//Perjalanan
Route::get('/perjalanan', 'PerjalananController@index')->name('perjalanan.index');
Route::get('/perjalanan/create', 'PerjalananController@create')->name('perjalanan.create');
Route::post('/perjalanan/store', 'PerjalananController@store')->name('perjalanan.store');
Route::get('/perjalanan/cetak_pdf', 'PerjalananController@cetak_pdf')->name('perjalanan.cetak_pdf');
Route::get('/perjalanan/edit/{id_surat}', 'PerjalananController@edit')->name('perjalanan.edit');
Route::post('/perjalanan/update/{id_surat}', 'PerjalananController@update')->name('perjalanan.update');
Route::get('/perjalanan/hapus/{id_surat}', 'PerjalananController@destroy')->name('perjalanan.hapus');
Route::get('/perjalanan/cetak_pdf_id/{id_surat}', 'PerjalananController@cetak_pdf_id')->name('perjalanan.cetak_pdf_id');


//Pendidikan
Route::get('/pegawai/pendidikan/{id_pegawai}', 'PendidikanController@index')->name('pegawai.pendidikan');
Route::post('/pegawai/pendidikan/store/{id_pegawai}', 'PendidikanController@update')->name('pendidikan.store');

//Keluarga
Route::get('/keluarga/index', 'KeluargaController@index')->name('keluarga.index');
Route::get('/keluarga/create/{id_pegawai}', 'KeluargaController@create')->name('keluarga.create');
Route::post('/keluarga/store', 'KeluargaController@store')->name('keluarga.store');
Route::get('/keluarga/edit', 'KeluargaController@edit')->name('keluarga.edit');
Route::post('/keluarga/update', 'KeluargaController@update')->name('keluarga.update');
Route::get('/keluarga/hapus/{id_pegawai}', 'KeluargaController@destroy')->name('keluarga.hapus');

//Sertifikat
Route::get('/pegawai/sertifikat/index/{id_pegawai}', 'SertifikatController@index')->name('pegawai.sertifikat.index');
Route::get('/pegawai/sertifikat/{id_pegawai}', 'SertifikatController@create')->name('pegawai.sertifikat');
Route::post('/pegawai/sertifikat/store/{id_pegawai}', 'SertifikatController@store')->name('pegawai.sertifikat.store');
Route::get('/pegawai/sertifikat/edit/{id_pegawai}/{id_sertifikat}', 'SertifikatController@create')->name('pegawai.sertifikat.edit');
