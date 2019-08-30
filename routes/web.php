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
Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});
Route::group(['middleware' => ['auth','role:HR']], function(){
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
	Route::get('/pegawai/detail/{id}', 'PegawaiController@detail')->name('pegawai.detail');
	Route::get('/pegawai/create', 'PegawaiController@create')->name('pegawai.create');
	Route::get('/pegawai/print', 'PegawaiController@print')->name('pegawai.print');
	Route::post('/pegawai/store', 'PegawaiController@store')->name('pegawai.store');
	Route::get('/pegawai/edit/{id_pegawai}', 'PegawaiController@edit')->name('pegawai.edit');
	Route::post('/pegawai/update/{id_pegawai}', 'PegawaiController@update')->name('pegawai.update');
	Route::get('/pegawai/hapus/{id_pegawai}', 'PegawaiController@destroy')->name('pegawai.hapus');

	Route::get('/pegawai/destroy/{id_pegawai}', 'PegawaiController@destroy')->name('pegawai.destroy');
	Route::post('/pegawai/updatejabatan/{id_pegawai}', 'PegawaiController@updateJabatan')->name('pegawai.updatejabatan');


	//Surat SP
	Route::get('/surat-sp/index', 'SPController@index')->name('sp.index');
	Route::get('/surat-sp/create', 'SPController@create')->name('sp.create');
	Route::post('/surat-sp/store', 'SPController@store')->name('sp.store');
	Route::get('/surat-sp/edit/{id_sp}', 'SPController@edit')->name('sp.edit');
	Route::post('/surat-sp/update/{id_sp}', 'SPController@update')->name('sp.update');
	Route::get('/surat-sp/hapus/{id_sp}', 'SPController@destroy')->name('sp.hapus');
	Route::get('/surat-sp/cetak_pdf', 'SPController@cetak_pdf')->name('sp.cetak_pdf');
	Route::get('/surat-sp/cetak_pdf_id/{id_surat}', 'SPController@cetak_pdf_id')->name('sp.cetak_pdf_id');

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

	//No Darurat
	Route::get('/no-darurat/create/{id_pegawai}','NoDaruratController@create')->name('darurat.create');
	Route::post('/no-darurat/store/{id_pegawai}','NoDaruratController@store')->name('darurat.store');
	Route::get('/no-darurat/edit/{id_pegawai}/{id_no_darurat}','NoDaruratController@edit')->name('darurat.edit');
	Route::post('/no-darurat/update/{id_pegawai}/{id_no_darurat}','NoDaruratController@update')->name('darurat.update');
	Route::get('/no-darurat/delete/{id_pegawai}/{id_no_darurat}','NoDaruratController@destroy')->name('darurat.destroy');

	//Keluarga
	Route::get('/keluarga/create/{id_pegawai}','KeluargaController@create')->name('keluarga.create');
	Route::post('/keluarga/store/{id_pegawai}','KeluargaController@store')->name('keluarga.store');
	Route::get('/keluarga/edit/{id_pegawai}/{id_keluarga}','KeluargaController@edit')->name('keluarga.edit');
	Route::post('/keluarga/update/{id_pegawai}/{id_keluarga}','KeluargaController@update')->name('keluarga.update');
	Route::get('/keluarga/delete/{id_pegawai}/{id_keluarga}','KeluargaController@destroy')->name('keluarga.destroy');

	//Sertifikat
	Route::get('/pegawai/sertifikat/index/{id_pegawai}', 'SertifikatController@index')->name('pegawai.sertifikat.index');
	Route::get('/pegawai/sertifikat/{id_pegawai}', 'SertifikatController@create')->name('pegawai.sertifikat');
	Route::post('/pegawai/sertifikat/store/{id_pegawai}', 'SertifikatController@store')->name('pegawai.sertifikat.store');
	Route::get('/pegawai/sertifikat/edit/{id_pegawai}/{id_sertifikat}', 'SertifikatController@edit')->name('pegawai.sertifikat.edit');
	Route::post('/pegawai/sertifikat/update/{id_pegawai}/{id_sertifikat}', 'SertifikatController@update')->name('pegawai.sertifikat.update');
	Route::get('/pegawai/sertifikat/delete/{id_pegawai}/{id_sertifikat}', 'SertifikatController@destroy')->name('pegawai.sertifikat.destroy');

	//Kontrak
	Route::get('/pegawai/kontrak/create/{id_pegawai}', 'KontrakController@create')->name('kontrak.create');
	Route::post('/pegawai/kontrak/store/{id_pegawai}', 'KontrakController@store')->name('kontrak.store');
	Route::get('/pegawai/kontrak/edit/{id_pegawai}/{id_kontrak}', 'KontrakController@edit')->name('kontrak.edit');
	Route::post('/pegawai/kontrak/update/{id_pegawai}/{id_kontrak}', 'KontrakController@update')->name('kontrak.update');
	Route::get('/pegawai/kontrak/delete/{id_pegawai}/{id_kontrak}', 'KontrakController@destroy')->name('kontrak.hapus');

	//Pengalaman
	Route::get('/pegawai/pengalaman/create/{id_pegawai}', 'PengalamanKerjaController@create')->name('pengalaman.create');
	Route::post('/pegawai/pengalaman/store/{id_pegawai}', 'PengalamanKerjaController@store')->name('pengalaman.store');
	Route::get('/pegawai/pengalaman/edit/{id_pegawai}/{id_pengalaman}', 'PengalamanKerjaController@edit')->name('pengalaman.edit');
	Route::post('/pegawai/pengalaman/update/{id_pegawai}/{id_pengalaman}', 'PengalamanKerjaController@update')->name('pengalaman.update');
	Route::get('/pegawai/pengalaman/delete/{id_pegawai}/{id_pengalaman}', 'PengalamanKerjaController@destroy')->name('pengalaman.hapus');

	//Pelatihan
	Route::get('/pegawai/pelatihan/create/{id_pegawai}', 'PelatihanController@create')->name('pelatihan.create');
	Route::post('/pegawai/pelatihan/store/{id_pegawai}', 'PelatihanController@store')->name('pelatihan.store');
	Route::get('/pegawai/pelatihan/edit/{id_pegawai}/{id_pengalaman}', 'PelatihanController@edit')->name('pelatihan.edit');
	Route::post('/pegawai/pelatihan/update/{id_pegawai}/{id_pengalaman}', 'PelatihanController@update')->name('pelatihan.update');
	Route::get('/pegawai/pelatihan/delete/{id_pegawai}/{id_pengalaman}', 'PelatihanController@destroy')->name('pelatihan.hapus');
	Route::get('/pegawai/sertifikat/edit/{id_pegawai}/{id_sertifikat}', 'SertifikatController@create')->name('pegawai.sertifikat.edit');

	//absen-pegawai
	Route::get('/absen/index', 'AbsenController@index')->name('absen.index');
	Route::get('/absen/detail/{id}', 'AbsenController@detail')->name('absen.detail');
	Route::get('/absen/create/{id_pegawai}', 'AbsenController@create')->name('absen.create');
	Route::get('/absen/print', 'AbsenController@print')->name('absen.print');
	Route::post('/absen/store/{id_pegawai}', 'AbsenController@store')->name('absen.store');
	Route::get('/absen/edit/{id_pegawai}', 'AbsenController@edit')->name('absen.edit');
	Route::post('/absen/update/{id_pegawai}', 'AbsenController@update')->name('absen.update');
	Route::get('/absen/hapus/{id_pegawai}', 'AbsenController@destroy')->name('absen.hapus');

	Route::get('/absen/destroy/{id_pegawai}', 'AbsenController@destroy')->name('absen.destroy');
	Route::get('/absen/profil/{id_pegawai}', 'AbsenController@profil')->name('absen.profil');

	//Gaji
	Route::get('/gaji/create', 'GajiController@index')->name('gaji.create');
	Route::get('/getpegawai/{id_pegawai}', 'GajiController@getpegawai')->name('getpegawai');	
});

Route::group(['middleware' => ['auth','role:Admin']], function(){
	//Jabatan
	Route::get('/jabatan/index', 'JabatanController@jabatan')->name('jabatan.index');
	Route::get('/jabatan/create', 'JabatanController@create')->name('jabatan.create');
	Route::post('/jabatan/store', 'JabatanController@store')->name('jabatan.store');
	Route::get('/jabatan/edit/{id_jabatan}', 'JabatanController@edit')->name('jabatan.edit');
	Route::post('/jabatan/update/{id_jabatan}', 'JabatanController@update')->name('jabatan.update');
	Route::get('/jabatan/hapus/{id_jabatan}', 'JabatanController@destroy')->name('jabatan.hapus');

});

Route::group(['middleware' => ['auth','role:Pegawai']], function(){
	//Akses Pegawai
	Route::get('/pegawai/profil/{id_pegawai}', 'PegawaiController@profile')->name('pegawai.profil');
	Route::get('/pegawai/personal/edit/{id_pegawai}','PegawaiController@editpersonal')->name('pegawai.editperson');
	Route::post('/pegawai/personal/update/{id_pegawai}','PegawaiController@updatepersonal')->name('pegawai.updateperson');
	Route::get('/pegawai/pengalaman/{id_pegawai}','PengalamanKerjaController@pengalamanindex')->name('pegawai.pengalaman');
	Route::get('/pegawai/pengalaman/insert/{id_pegawai}','PengalamanKerjaController@createtemp')->name('pengalaman.createpengtemp');
	Route::post('/pegawai/pengalaman/save/{id_pegawai}','PengalamanKerjaController@storetemp')->name('pengalaman.storetemp');
	Route::get('/pegawai/keluarga/index/{id_pegawai}','KeluargaController@ortu')->name('keluarga.ortu');
});
