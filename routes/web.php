<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\JadwalPoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\MaklumatController;
use App\Http\Controllers\SurveiController;


/*
|--------------------------------------------------------------------------
| FRONTEND (HALAMAN DEPAN)
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', [FrontController::class, 'index'])->name('beranda');


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/
Route::prefix('profil')->group(function () {
    Route::get('/sejarah', [FrontController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/visi-misi', [FrontController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/struktur-organisasi', [FrontController::class, 'struktur'])->name('profil.struktur');
    Route::get('/prestasi-indikator', [FrontController::class, 'prestasi'])->name('profil.prestasi');
});


/*
|--------------------------------------------------------------------------
| LAYANAN MEDIS
|--------------------------------------------------------------------------
*/
Route::prefix('layanan/medis')->group(function () {
    Route::get('/igd', [FrontController::class, 'igd'])->name('layanan.igd');
    Route::get('/rawat-jalan', [FrontController::class, 'rawatJalan'])->name('layanan.rawat-jalan');
    Route::get('/rawat-inap', [FrontController::class, 'rawatinap'])->name('layanan.rawat-inap');
    Route::get('/mcu', [FrontController::class, 'mcu'])->name('layanan.mcu');
});


/*
|--------------------------------------------------------------------------
| LAYANAN PENUNJANG
|--------------------------------------------------------------------------
*/
Route::prefix('layanan/penunjang')->group(function () {
    Route::get('/farmasi', [FrontController::class, 'farmasi'])->name('layanan.farmasi');
    Route::get('/laboratorium', [FrontController::class, 'laboratorium'])->name('layanan.laboratorium');
    Route::get('/radiologi', [FrontController::class, 'radiologi'])->name('layanan.radiologi');
    Route::get('/fisioterapi', [FrontController::class, 'fisioterapi'])->name('layanan.fisioterapi');
});


/*
|--------------------------------------------------------------------------
| INFORMASI (Jadwal Poli, Maklumat, Dokter, Agenda, Pengaduan, Pendaftaran Online, Hak Pasien)
|--------------------------------------------------------------------------
*/
Route::prefix('informasi')->group(function () {

    Route::get('/jadwal-poli', [FrontController::class, 'jadwalPoli'])
        ->name('informasi.jadwal-poli');

    Route::get('/maklumat', [FrontController::class, 'maklumat'])
        ->name('informasi.maklumat');

    Route::get('/dokter', [FrontController::class, 'dokter'])
        ->name('informasi.dokter');
        
    Route::get('/agenda', [FrontController::class, 'agenda'])
        ->name('informasi.agenda');

    Route::get('/gallery', [FrontController::class, 'gallery'])
        ->name('informasi.gallery');

    Route::get('/gallery-video', [FrontController::class, 'galleryVideo'])
        ->name('informasi.gallery-video');

    Route::get('/pengaduan', [FrontController::class, 'pengaduan'])
        ->name('informasi.pengaduan');

    Route::get('/pendaftaran-online', [FrontController::class, 'pendaftaranonline'])
        ->name('informasi.pendaftaran-online');

    Route::get('/hak', [FrontController::class, 'hakpasien'])
        ->name('informasi.hak');
    
    Route::post('/survei', [SurveiController::class, 'store'])
        ->name('/informasi/survei.store');
    // Route::post('/informasi/survei', [SurveiController::class, 'store']);

    Route::get('/survei/grafik', [SurveiController::class, 'grafik'])
        ->name('/informasi/survei.grafik');
});





/*
|--------------------------------------------------------------------------
| BERITA PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('berita.detail');



/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/rs-login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/rs-login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/rs-logout', [AuthController::class, 'logout'])->name('admin.logout');



/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::prefix('rs-admin')->middleware('auth')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Halaman Statis
    Route::resource('halaman', PageContentController::class)->names('pagecontents');

    // Galeri
    Route::resource('gallery', GalleryController::class);

    // Berita
    Route::resource('news', AdminNewsController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');

    // Agenda
    Route::resource('agenda', AgendaController::class);

    // Jadwal Poli
    Route::resource('jadwalpoli', JadwalPoliController::class);

    // Data Dokter
    Route::resource('dokter', DokterController::class);

    // Maklumat Pelayanan
    Route::resource('maklumat', MaklumatController::class);


        /*
    |--------------------------------------------------------------------------
    |  ROUTE DOWNLOAD TAMBAHAN
    |--------------------------------------------------------------------------
    */

    // Download Halaman
    Route::get('halaman/download', [PageContentController::class, 'download'])
        ->name('pagecontents.download');

    // Download Gallery
    Route::get('gallery/download', [GalleryController::class, 'download'])
        ->name('gallery.download');

    // Download Berita
    Route::get('news/download', [AdminNewsController::class, 'download'])
        ->name('news.download');

    // Download Agenda
    Route::get('agenda/download', [AgendaController::class, 'download'])
        ->name('agenda.download');

    // Download Jadwal Poli
    Route::get('jadwalpoli/download', [JadwalPoliController::class, 'download'])
        ->name('jadwalpoli.download');

    // Download Dokter
    Route::get('dokter/download', [DokterController::class, 'download'])
        ->name('dokter.download');

    // Download Maklumat
    Route::get('maklumat/download', [MaklumatController::class, 'download'])
        ->name('maklumat.download');

    Route::get('/survei/hasil', [SurveiController::class, 'hasil'])
        ->name('survei.hasil');

    Route::get('/survei/download', [SurveiController::class, 'download'])
        ->name('survei.download');

    Route::get('/survei/download/harian', [SurveiController::class, 'downloadHarian'])
    ->name('survei.download.harian');

    Route::get('/survei/download/bulanan', [SurveiController::class, 'downloadBulanan'])
    ->name('survei.download.bulanan');

    Route::get('/survei/download/tahunan', [SurveiController::class, 'downloadTahunan'])
    ->name('survei.download.tahunan');

    Route::delete('/survei/{id}', [SurveiController::class, 'destroy'])
    ->name('survei.destroy');

    // ===============================
// FILTER CETAK SURVEI (DINAMIS)
// ===============================
Route::get('/survei/download/filter', 
    [SurveiController::class, 'downloadFilter']
)->name('survei.download.filter');
});

