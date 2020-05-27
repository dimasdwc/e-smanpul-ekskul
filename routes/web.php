<?php

Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	return "Cache is cleared";
});

Route::get('/', function () {
	return view('auth.login');
});

/*-----------------------------------------------------------------------------------------------*/
// Route::get('/user', 'PenggunaController@index');
   

// Route::get('/data-siswa', 'DataSiswaController@dataSiswa');
// Route::get('get_absen_pelatih', 'DaftarEkskulController@getAbsenPelatih')-> name('get_absen_pelatih'); 
// Route::get('get_absen_siswa', 'DaftarEkskulController@getAbsenSiswa')-> name('get_absen_siswa'); 
Route::get('get_data_siswa', 'DataSiswaController@getDataSiswa')-> name('get_data_siswa'); 
Route::get('/pelatih/{id}/detail', 'PelatihController@detail');
/*-----------------------------------------------------------------------------------------------*/

Route::get('/dashboard', function () {
return view('dashboard');
});
Route::group(['prefix' => 'waka', 'middleware' => ['auth', 'role']], function()
{
	/* WAKA Route */
	Route::get('/', 'WakaController@index');
	Route::get('/profil', 'WakaController@profil');

	/* Route Waka- Data Siswa */
	Route::get('/siswa', 'DataSiswaController@index');
	Route::get('/deskripsi', 'DeskripsiPenilaianController@index');
	Route::get('/siswa/{id}/ubah', 'DataSiswaController@ubah');	
	Route::post('/siswa/tambah', 'DataSiswaController@tambah');
	Route::get('/siswa/{id}/hapus', 'DataSiswaController@hapus');

	/* Route Waka- Data Ekskul */
	Route::get('/ekskul', 'DataEkskulController@index');
	Route::post('/tambah-ekskul', 'DataEkskulController@tambah');
	Route::get('waka_get_data_ekskul', 'DataEkskulController@tabel_tampil_ekskul')-> name('waka_get_data_ekskul'); 
	Route::get('/ekskul/rumpun', 'DataEkskulController@showRumpun');
	Route::get('/ekskul/{id}/detail', 'DataEkskulController@detail');      

	/* Route Waka- Data pelatih */
	Route::get('/pelatih', 'DataPelatihController@index');
	Route::post('/tambah-pelatih', 'DataPelatihController@tambah');
	Route::get('/pelatih/{id}/detail', 'DataPelatihController@detail');
	Route::get('waka_get_data_pelatih','DataPelatihController@get_data_pelatih')->name('waka_get_data_pelatih');

	/* Route Waka- Data Pembina */
	Route::get('/pembina', 'DataPembinaController@index');

	/* Route Waka- Data Penilaian siswa */
	Route::get('/penilaian-siswa', 'DataPenilaianSiswaController@index');
});

Route::group(['prefix' => 'pelatih', 'middleware' => ['auth', 'role']], function()
{
	/* Pelatih Route */
	Route::get('/', 'PelatihController@index');
	Route::get('/profil', 'PelatihController@profil');

	/* Route - Data Anggota */
	Route::get('/anggota', 'DataAnggotaController@index');
	Route::get('/{id}/tambah-anggota', 'DataAnggotaController@tambah_anggota');
	Route::get('/{siswa_id}/detail-anggota', 'DataAnggotaController@detail');
	Route::get('getpenilaian_anggota/{siswa_id}', 'DataAnggotaController@getRiwayatPenilaian');
	Route::get('getabsensi_anggota/{siswa_id}', 'DataAnggotaController@getRiwayatAbsensi');
	Route::get('get_data_anggota', 'DataAnggotaController@tabel_anggota')-> name('get_data_anggota'); 
	Route::get('get_data_anggota_baru', 'DataAnggotaController@getDataAnggotaBaru')-> name('get_data_anggota_baru');

	/* Route - Absensi Pelatih */
	Route::get('/absensi', 'AbsensiPelatihController@index');
	Route::post('/absensi', 'AbsensiPelatihController@tambah');
	Route::get('getAbsenPelatih', 'AbsensiPelatihController@getAbsenPelatih')-> name('getAbsenPelatih'); 

	/* Route - Absensi Anggota */
	Route::get('/absensi-anggota', 'AbsensiAnggotaController@index');
	Route::get('/{id}/tambah-absensi', 'AbsensiAnggotaController@index');
	Route::post('/absensi-anggota', 'AbsensiAnggotaController@tambah');
	Route::get('get_data_absensi_anggota', 'AbsensiAnggotaController@tabel_absensi_anggota')-> name('get_data_absensi_anggota'); 
	Route::get('get_data_riwayat_absensi_anggota', 'AbsensiAnggotaController@tabel_riwayat_absensi_anggota')-> name('get_data_riwayat_absensi_anggota'); 

	/* Route - Deksripsi Penilaian */
	Route::get('/deskripsi', 'PenilaianDeskripsiController@index');
	Route::get('/{id}/hapus-deskripsi', 'PenilaianDeskripsiController@hapus');
	Route::post('/deskripsi', 'PenilaianDeskripsiController@tambah');

	/* Route - Data Penilaian */
	Route::get('/penilaian', 'PenilaianAnggotaController@index');
	Route::get('/{id}/penilaian-anggota', 'PenilaianAnggotaController@tambah');
	Route::post('/tambah-penilaian', 'PenilaianAnggotaController@store');
	Route::get('/{id}/hapus-penilaian', 'PenilaianAnggotaController@hapus');
	Route::get('get_data_penilaian_anggota', 'PenilaianAnggotaController@get_penilaian_anggota')-> name('get_data_penilaian_anggota'); 
	Route::get('get_data_riwayat_penilaian', 'PenilaianAnggotaController@getRiwayatRenilaian')-> name('get_data_riwayat_penilaian'); 
});

Auth::routes();
