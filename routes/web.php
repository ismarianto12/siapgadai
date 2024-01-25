<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisGuruController;
use App\Http\Controllers\LaporanPegadaianController;
use App\Http\Controllers\LaporanPendapatanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TmpGuruController;
use App\Http\Controllers\SiswaPresensiController;

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::group(['middleware' => ['auth', 'api']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('index.html');
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profile', [UserController::class, 'profile']);
    });
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('barang', BarangController::class);
        Route::resource('cabang', CabangController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('user', UserController::class);

        Route::resource('identitas', IdentitasController::class);
        Route::post('save_identitas', [HomeController::class, 'save_identitas'])->name('save_identitas');
        Route::get('download_report', [GuruController::class, 'xls_report'])->name('download_report');
    });

    Route::prefix('app')->name('app.')->group(function () {
        Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
        Route::post('save_transaksi', [TransaksiController::class, 'index'])->name('save_transaksi');

    });
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('pegadaian', [LaporanPegadaianController::class, 'index'])->name('pegadaian');
        Route::get('pendapatan', [LaporanPendapatanController::class, 'index'])->name('pendapatan');

    });
    // api  route datatable 
    Route::prefix('api')->name('api.')->group(function () {
        Route::post('barang', [MapelController::class, 'api'])->name('barang');
        Route::post('cabang', [JadwalController::class, 'api'])->name('cabang');
        // api
        Route::get('pegadaian', [LaporanPegadaianController::class, 'api'])->name('pegadaian');
        Route::post('pendapatan', [LaporanPendapatanController::class, 'api'])->name('pendapatan');

        Route::post('user', [UserController::class, 'api'])->name('user');
    });
    Route::post('jenis_show/{id}', [GuruController::class, 'carijenis'])->name('jenis_show');
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('laporan_presensi', [SiswaPresensiController::class, 'laporan_presensi'])->name('laporan_presensi');
        Route::post('delete_presensi', [SiswaPresensiController::class, 'destroy'])->name('delete_presensi');

        Route::get('pegawai', [PegawaiController::class, 'laporan_pegawai'])->name('pegawai');
        Route::get('siswa', [SiswaController::class, 'laporan_siswa'])->name('siswa');
    });

    Route::prefix('dashboard_api')->name('dashboard_api.')->group(function () {
        Route::get('site_jabodetabek', [HomeController::class, 'site_jabodetabek'])->name('site_jabodetabek');
        Route::get('pr_western_jabo', [HomeController::class, 'pr_western_jabo'])->name('pr_western_jabo');
        Route::get('pr_centeral_jabo', [HomeController::class, 'pr_centeral_jabo'])->name('pr_centeral_jabo');
        Route::get('pr_eastern_jabo', [HomeController::class, 'pr_eastern_jabo'])->name('pr_eastern_jabo');

        Route::get('graph_revenue', [HomeController::class, 'graph_revenue'])->name('graph_revenue');
    });
});

Auth::routes();
