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


Auth::routes();
Route::get('/', 'FrontController@front')->name('front');
Route::get('/media', 'FrontController@media')->name('mediafront');
Route::get('/komunikasi', 'FrontController@komunikasi')->name('komunikasi');
Route::get('/datatower', 'FrontController@datatower')->name('datatower');
Route::get('/grafiktower', 'FrontController@grafiktower')->name('grafiktower');
Route::get('/aplikasi', 'FrontController@aplikasi')->name('aplikasi');
Route::get('/dataaplikasi', 'FrontController@dataaplikasi')->name('dataaplikasi');
Route::get('/grafikaplikasi', 'FrontController@grafikaplikasi')->name('grafikaplikasi');

Route::get('/login','LoginController@index');
Route::post('/signin','LoginController@postsignin')->name('signin');
Route::get('/landing', 'HomeController@landingpage')->name('dashboard');
Route::get('/dashboard/diskominfotik', 'HomeController@home_diskominfotik')->name('diskominfotik');
Route::get('/dashboard/bksdm', 'HomeController@home_bksdm')->name('bksdm');
Route::get('/dashboard/dkumpp', 'HomeController@home_dkumpp')->name('dkumpp');
Route::get('/dashboard/media', 'HomeController@home_media')->name('media');
Route::get('qrcode', 'HomeController@showqrcode')->name('showqrcode');
Route::get('logout', 'HomeController@logout')->name('logout');
Route::get('cekqrcode/{id}', 'HomeController@cekqrcode')->name('cekqrcode');

// Route::get('qrcode', function () {
//     return QrCode::size(300)->generate('www.mandankoding.com');
// });

//ROUTE MASTER
Route::prefix('pegawai')->group(function(){
    Route::get('/', 'PegawaiController@index')->name('pegawai');
    Route::get('/create', 'PegawaiController@create');
    Route::post('/simpan', 'PegawaiController@simpan');
    Route::get('/edit/{id}', 'PegawaiController@edit');
    Route::patch('/update/{id}', 'PegawaiController@update');
    Route::get('/delete/{id}', 'PegawaiController@delete');
});

Route::prefix('golongan')->group(function(){
    Route::get('/', 'GolonganController@index')->name('golongan')->middleware('auth');
    Route::get('/create', 'GolonganController@create');
    Route::post('/simpan', 'GolonganController@simpan');
    Route::get('/edit/{id}', 'GolonganController@edit');
    Route::patch('/update/{id}', 'GolonganController@update');
    Route::get('/delete/{id}', 'GolonganController@delete');
});

Route::prefix('jabatan')->group(function(){
    Route::get('/', 'JabatanController@index')->name('jabatan')->middleware('auth');
    Route::get('/create', 'JabatanController@create');
    Route::post('/simpan', 'JabatanController@simpan');
    Route::get('/edit/{id}', 'JabatanController@edit');
    Route::patch('/update/{id}', 'JabatanController@update');
    Route::get('/delete/{id}', 'JabatanController@delete');
});

Route::prefix('kecamatan')->group(function(){
    Route::get('/', 'KecamatanController@index')->name('kecamatan')->middleware('auth');
    Route::get('/create', 'KecamatanController@create');
    Route::post('/simpan', 'KecamatanController@simpan');
    Route::get('/edit/{id}', 'KecamatanController@edit');
    Route::patch('/update/{id}', 'KecamatanController@update');
    Route::get('/delete/{id}', 'KecamatanController@delete');
});

Route::prefix('kelurahan')->group(function(){
    Route::get('/', 'KelurahanController@index')->name('kelurahan')->middleware('auth');
    Route::get('/create', 'KelurahanController@create');
    Route::post('/simpan', 'KelurahanController@simpan');
    Route::get('/edit/{id}', 'KelurahanController@edit');
    Route::patch('/update/{id}', 'KelurahanController@update');
    Route::get('/delete/{id}', 'KelurahanController@delete');
});

Route::prefix('instansi')->group(function(){
    Route::get('/', 'InstansiController@index')->name('instansi')->middleware('auth');
    Route::get('/create', 'InstansiController@create');
    Route::post('/simpan', 'InstansiController@simpan');
    Route::get('/edit/{id}', 'InstansiController@edit');
    Route::patch('/update/{id}', 'InstansiController@update');
    Route::get('/delete/{id}', 'InstansiController@delete');
});

Route::prefix('ssh')->group(function(){
    Route::get('/', 'NodinController@index')->name('nodin')->middleware('auth');
    Route::get('/create', 'NodinController@create');
    Route::post('/simpan', 'NodinController@simpan');
    Route::get('/edit/{id}', 'NodinController@edit');
    Route::post('/update/{id}', 'NodinController@update');
    Route::get('/delete/{id}', 'NodinController@delete');
});

Route::prefix('notadinas')->group(function(){
    Route::get('/', 'NodinController@index')->name('nodin')->middleware('auth');
    Route::get('/create', 'NodinController@create');
    Route::post('/simpan', 'NodinController@simpan');
    Route::get('/edit/{id}', 'NodinController@edit');
    Route::post('/update/{id}', 'NodinController@update');
    Route::get('/delete/{id}', 'NodinController@delete');
});

Route::prefix('rincian')->group(function(){
    Route::get('/', 'RincianController@index')->name('nodin')->middleware('auth');
    Route::get('/create', 'RincianController@create');
    Route::post('/simpan', 'RincianController@simpan');
    Route::get('/edit/{id}', 'RincianController@edit');
    Route::post('/update/{id}', 'RincianController@update');
    Route::get('/delete/{id}', 'RincianController@delete');
});

//ROUTE DISKOMINFOTIK

Route::prefix('website')->group(function(){
    Route::get('/', 'diskominfotik\AplikasiController@index')->name('website')->middleware('auth');
    Route::get('/create', 'diskominfotik\AplikasiController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\AplikasiController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\AplikasiController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\AplikasiController@edit')->middleware('auth');
    Route::post('/update/{id}', 'diskominfotik\AplikasiController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\AplikasiController@delete')->middleware('auth');
    Route::get('/cari', 'diskominfotik\AplikasiController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'diskominfotik\AplikasiController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'diskominfotik\AplikasiController@grafik')->middleware('auth');
    Route::get('/cekqrcode/{id}', 'diskominfotik\AplikasiController@cekqrcode');
});

Route::prefix('tower')->group(function(){
    Route::get('/', 'diskominfotik\TowerController@index')->name('tower')->middleware('auth');
    Route::get('/create', 'diskominfotik\TowerController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\TowerController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\TowerController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\TowerController@edit')->middleware('auth');
    Route::post('/update/{id}', 'diskominfotik\TowerController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\TowerController@delete')->middleware('auth');
    Route::get('/cari', 'diskominfotik\TowerController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'diskominfotik\TowerController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'diskominfotik\TowerController@grafik')->middleware('auth');
});

Route::prefix('site')->group(function(){
    Route::get('/', 'diskominfotik\SiteController@index')->name('site')->middleware('auth');
    Route::get('/create', 'diskominfotik\SiteController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\SiteController@simpan')->middleware('auth');
    Route::get('/fetch', 'diskominfotik\SiteController@fetch')->name('fetchkel')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\SiteController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\SiteController@edit')->middleware('auth');
    Route::post('/update/{id}', 'diskominfotik\SiteController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\SiteController@delete')->middleware('auth');
    Route::get('/cari', 'diskominfotik\SiteController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'diskominfotik\SiteController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'diskominfotik\SiteController@grafik')->middleware('auth');
});

Route::prefix('provider')->group(function(){
    Route::get('/', 'diskominfotik\ProviderController@index')->name('provider')->middleware('auth');
    Route::get('/create', 'diskominfotik\ProviderController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\ProviderController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\ProviderController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\ProviderController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'diskominfotik\ProviderController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\ProviderController@delete')->middleware('auth');
});

Route::prefix('operator')->group(function(){
    Route::get('/', 'diskominfotik\OperatorController@index')->name('operator')->middleware('auth');
    Route::get('/create', 'diskominfotik\OperatorController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\OperatorController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\OperatorController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\OperatorController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'diskominfotik\OperatorController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\OperatorController@delete')->middleware('auth');
});

Route::prefix('pic')->group(function(){
    Route::get('/', 'diskominfotik\PicController@index')->name('pic')->middleware('auth');
    Route::get('/create', 'diskominfotik\PicController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\PicController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\PicController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\PicController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'diskominfotik\PicController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\PicController@delete')->middleware('auth');
});

Route::prefix('program')->group(function(){
    Route::get('/', 'diskominfotik\ProgramController@index')->name('program')->middleware('auth');
    Route::get('/create', 'diskominfotik\ProgramController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\ProgramController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\ProgramController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\ProgramController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'diskominfotik\ProgramController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\ProgramController@delete')->middleware('auth');
});

Route::prefix('role')->group(function(){
    Route::get('/', 'RoleController@index')->name('role')->middleware('auth');
    Route::get('/create', 'RoleController@create')->middleware('auth');
    Route::post('/simpan', 'RoleController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'RoleController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'RoleController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'RoleController@update')->middleware('auth');
    Route::get('/delete/{id}', 'RoleController@delete')->middleware('auth');
});

Route::prefix('dokumen')->group(function(){
    Route::get('/smasukaplikasi', 'diskominfotik\DokumenController@smasukaplikasi')->name('smasukaplikasi')->middleware('auth');
    Route::get('/skeluaraplikasi', 'diskominfotik\DokumenController@skeluaraplikasi')->name('skeluaraplikasi')->middleware('auth');
    Route::get('/smasuktower', 'diskominfotik\DokumenController@smasuktower')->name('smasuktower')->middleware('auth');
    Route::get('/skeluartower', 'diskominfotik\DokumenController@skeluartower')->name('skeluartower')->middleware('auth');
    Route::get('/create', 'diskominfotik\DokumenController@create')->middleware('auth');
    Route::post('/simpan', 'diskominfotik\DokumenController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'diskominfotik\DokumenController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'diskominfotik\DokumenController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'diskominfotik\DokumenController@update')->middleware('auth');
    Route::get('/delete/{id}', 'diskominfotik\DokumenController@delete')->middleware('auth');
});

//ROUTE DKUMPP

Route::prefix('barang')->group(function(){
    Route::get('/', 'dkumpp\BarangController@index')->name('barang')->middleware('auth');
    Route::get('/create', 'dkumpp\BarangController@create')->middleware('auth');
    Route::post('/simpan', 'dkumpp\BarangController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'dkumpp\BarangController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'dkumpp\BarangController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'dkumpp\BarangController@update')->middleware('auth');
    Route::get('/delete/{id}', 'dkumpp\BarangController@delete')->middleware('auth');
});

Route::prefix('satuan')->group(function(){
    Route::get('/', 'dkumpp\SatuanController@index')->name('satuan')->middleware('auth');
    Route::get('/create', 'dkumpp\SatuanController@create')->middleware('auth');
    Route::post('/simpan', 'dkumpp\SatuanController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'dkumpp\SatuanController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'dkumpp\SatuanController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'dkumpp\SatuanController@update')->middleware('auth');
    Route::get('/delete/{id}', 'dkumpp\SatuanController@delete')->middleware('auth');
});

Route::prefix('merk')->group(function(){
    Route::get('/', 'dkumpp\MerkController@index')->name('merk')->middleware('auth');
    Route::get('/create', 'dkumpp\MerkController@create')->middleware('auth');
    Route::post('/simpan', 'dkumpp\MerkController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'dkumpp\MerkController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'dkumpp\MerkController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'dkumpp\MerkController@update')->middleware('auth');
    Route::get('/delete/{id}', 'dkumpp\MerkController@delete')->middleware('auth');
});

Route::prefix('komoditas')->group(function(){
    Route::get('/', 'dkumpp\KomoditasController@index')->name('komoditas')->middleware('auth');
    Route::get('/create', 'dkumpp\KomoditasController@create')->middleware('auth');
    Route::post('/simpan', 'dkumpp\KomoditasController@simpan')->middleware('auth');
    Route::get('/detail/{id}', 'dkumpp\KomoditasController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'dkumpp\KomoditasController@edit')->middleware('auth');
    Route::patch('/update/{id}', 'dkumpp\KomoditasController@update')->middleware('auth');
    Route::get('/delete/{id}', 'dkumpp\KomoditasController@delete')->middleware('auth');
    Route::get('/grafik', 'dkumpp\KomoditasController@grafik')->middleware('auth');
    Route::get('/cari', 'dkumpp\KomoditasController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'dkumpp\KomoditasController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'dkumpp\KomoditasController@grafik')->middleware('auth');
    Route::get('/cekqrcode/{id}', 'dkumpp\KomoditasController@cekqrcode');
});

//ROUTE MEDIA

Route::prefix('publikasi')->group(function(){
    Route::get('/', 'media\MediaController@index')->name('publikasi')->middleware('auth');
    Route::post('/simpan', 'media\MediaController@simpanpublikasi')->middleware('auth');
    Route::patch('/update/{id}', 'media\MediaController@updatepublikasi')->middleware('auth');

    Route::get('/media', 'media\MediaController@list')->name('media')->middleware('auth');
    Route::post('/media/simpan', 'media\MediaController@simpanmedia')->middleware('auth');
    Route::get('/detail/{id}', 'media\MediaController@detail')->middleware('auth');
    Route::get('/edit/{id}', 'media\MediaController@edit')->middleware('auth');
    
    Route::get('/delete/{id}', 'media\MediaController@delete')->middleware('auth');
    Route::get('/cari', 'media\MediaController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'media\MediaController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'media\MediaController@grafik')->middleware('auth');
    Route::get('/cekqrcode/{id}', 'media\MediaController@cekqrcode');
});

Route::prefix('post')->group(function(){
    Route::get('/', 'media\PostController@index')->name('post')->middleware('auth');
    Route::post('/simpan', 'media\PostController@simpan')->middleware('auth');
    Route::patch('/update/{id}', 'media\PostController@updatepublikasi')->middleware('auth');
    Route::get('/delete/{id}', 'media\PostController@delete')->middleware('auth');
    Route::get('/cari', 'media\PostController@FilterByYear')->middleware('auth');
    Route::get('/exportpdf', 'media\PostController@exportPDF')->middleware('auth');
    Route::get('/grafik', 'media\PostController@grafik')->middleware('auth');
    Route::get('/cekqrcode/{id}', 'media\PostController@cekqrcode');
});



