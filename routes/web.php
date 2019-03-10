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

Route::get('/', 'LoginController@home')->name('login.home');
Route::get('/login', 'LoginController@login')->name('login.index');
Route::post('/auth', 'LoginController@dologin')->name('login.auth');
Route::get('/logout', 'LoginController@Logout')->name('logout');
Route::get('/download/pedomanPKM/', 'LoginController@download_pedoman')->name('login.download');

// =============== Register ====================== //
Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/register/store', 'RegisterController@store')->name('register.store');

// ======== DASHBOARD ============= //
Route::get('beranda', 'DashboardController@index')->name('dashboard'); // Dashboard Pengurus
//Route::get('home', 'DashboardController@index')->name('home.peserta'); // Dashboard Peserta PKM

// ================= PERSETA PKM ====================== //
Route::get('/peserta-pkm', 'PesertaController@index')->name('peserta.index');
Route::get('/peserta-pkm/create', 'PesertaController@create')->name('peserta.create');
//Route::post('/peserta-pkm/store', 'PesertaController@store')->name('peserta.store');
//Route::get('/peserta-pkm/edit/{id}', 'PesertaController@edit')->name('peserta.edit');
Route::patch('/peserta-pkm/update/{id}', 'PesertaController@update')->name('peserta.update');
Route::patch('/peserta-pkm/update-pkm/{id}', 'PesertaController@update_pkm')->name('peserta.update_pkm');
Route::get('/peserta-pkm/detail/{id}', 'PesertaController@show')->name('peserta.show');
Route::post('/peserta-pkm/input-proposal', 'PesertaController@input_bidang_pkm')->name('peserta.store_pkm');
Route::patch('/peserta-pkm/upload/{id}', 'PesertaController@upload')->name('peserta.upload_pkm');
Route::post('/peserta-pkm/store-anggota', 'PesertaController@store_anggota')->name('peserta.storeanggota');
Route::delete('/peserta-pkm/delete-anggota/{id}', 'PesertaController@destroy_anggota')->name('peserta.destroy_anggota');
Route::post('/peserta-pkm/store-dosen', 'PesertaController@store_dosen')->name('peserta.storedosen');
Route::delete('/peserta-pkm/delete/{id}', 'PesertaController@destroy')->name('peserta.destroy');
Route::get('/peserta-pkm/setting/{id}', 'PesertaController@setting')->name('peserta.setting');
Route::post('/peserta-pkm/store-setting', 'PesertaController@setting_store')->name('peserta.setting_store');
Route::post('/peserta-pkm/reset-password', 'PesertaController@reset_password')->name('peserta.reset_password');
Route::get('/peserta-pkm/search','PesertaController@search')->name('peserta.search');
Route::patch('/peserta-pkm/upload-review/{id}', 'PesertaController@upload_review')->name('peserta.upload_review');
Route::get('/peserta-pkm/read-review/{id}', 'PesertaController@read_review')->name('peserta.read_review');


//=================== DASHBOARD PESERTA PKM ====================//
Route::get('/pengusul-pkm', 'PengusulController@index')->name('pengusul.index');
Route::post('/pengusul-pkm/store', 'PengusulController@store')->name('pengusul.store');
Route::post('/pengusul-pkm/input-proposal', 'PengusulController@input_bidang_pkm')->name('proposal.store');
Route::patch('/pengusul-pkm/update/{id}', 'PengusulController@update')->name('proposal.update');
Route::post('/pengusul-pkm/store-anggota', 'PengusulController@store_anggota')->name('pengusul.storeanggota');
Route::delete('/pengusul-pkm/delete/{id}', 'PengusulController@destroy')->name('pengusul.destroy');
Route::post('/pengusul-pkm/store-dosen', 'PengusulController@store_dosen')->name('pengusul.storedosen');
Route::patch('/pengusul-pkm/upload/{id}', 'PengusulController@upload')->name('pengusul.upload');
Route::get('/pengusul-pkm/readfile/{id}', 'PengusulController@readfile')->name('pengusul.read');
Route::get('/pengusul-pkm/simbelmawa', 'PengusulController@simbelmawa')->name('pengusul.simbelmawa');
Route::get('/pengusul-pkm/profil/', 'PengusulController@profil')->name('pengusul.profil');
Route::post('/pengusul-pkm/reset-password', 'PengusulController@reset_password')->name('pengusul.reset_password');


//=============================== BERKAS PKM ==================================//
Route::get('/berkas-pkm', 'BerkasController@index')->name('berkas.index');
Route::post('/berkas-pkm/store', 'BerkasController@store')->name('berkas.store');
Route::post('/berkas-pkm/ketentuan-store', 'BerkasController@ketentuan_store')->name('berkas.ketentuan');
Route::delete('/berkas-pkm/delete/{id}', 'BerkasController@destroy')->name('berkas.destroy');
Route::get('/berkas-pkm/readfile/{id}', 'BerkasController@readfile')->name('berkas.read');

//=============================== PENGURUS ==================================//
Route::get('/pengurus-kkm', 'PengurusController@index')->name('pengurus.index');
Route::post('/pengurus-kkm/store', 'PengurusController@store')->name('pengurus.store');

//=============================== PENGGUNA ==================================//
Route::get('/pengguna-kkm', 'RegisterController@index_pengguna')->name('pengguna.index');
Route::post('/pengguna-kkm/store', 'RegisterController@store_pengguna')->name('pengguna.store');
Route::get('/pengguna-kkm/detail/{id}', 'RegisterController@detail_pengguna')->name('pengguna.detail');
Route::get('/pengguna-kkm/edit/{id}', 'RegisterController@edit_pengguna')->name('pengguna.edit');
Route::patch('/pengguna-kkm/update/{id}', 'RegisterController@update_pengguna')->name('pengguna.update');
Route::delete('/pengguna-kkm/reset-password/{id}', 'RegisterController@reset_password_pengguna')->name('pengguna.reset_password');
Route::delete('/pengguna-kkm/delete/{id}', 'RegisterController@destroy_pengguna')->name('pengguna.destroy');

//=============================== PENGATURAN ==================================//
Route::get('/pengaturan', 'PengaturanController@index')->name('pengaturan.index');
Route::delete('/pengaturan/aktifkan/{id}', 'PengaturanController@aktifkan')->name('pengaturan.aktifkan');
Route::post('/pengaturan/store-berkas/', 'PengaturanController@store_berkas')->name('pengaturan.store_berkas');
Route::delete('/pengaturan/hapus-kategori/{id}', 'PengaturanController@destroy_kategori')->name('pengaturan.destroy_kategori');
Route::post('/pengaturan/store-prodi/', 'PengaturanController@store_prodi')->name('pengaturan.store_prodi');
Route::delete('/pengaturan/hapus-prodi/{id}', 'PengaturanController@destroy_prodi')->name('pengaturan.destroy_prodi');
Route::post('/pengaturan/store-role/', 'PengaturanController@store_role')->name('pengaturan.store_role');
Route::delete('/pengaturan/hapus-role/{id}', 'PengaturanController@destroy_role')->name('pengaturan.destroy_role');
Route::get('/profil/pengguna/', 'PengaturanController@profil')->name('pengaturan.profil');
