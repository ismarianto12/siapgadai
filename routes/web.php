<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\KategoryBarangController;
use App\Http\Controllers\LaporanPegadaianController;
use App\Http\Controllers\LaporanPendapatanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelunasanController;
use App\Http\Controllers\PenagihanController;
use App\Http\Controllers\PerhitunganBiayaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaPresensiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::group(['middleware' => ['auth', 'api']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('index.html');
    Route::get('user.profil.aspx', [UserController::class, 'profile']);
    Route::prefix('user')->name('user.')->group(function () {
        Route::post('chnage_password', [UserController::class, 'chnage_password'])->name('chnage_password');
    });
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('barang', BarangController::class);
        Route::resource('perhitungan_biaya', PerhitunganBiayaController::class);
        Route::resource('cabang', CabangController::class);
        Route::resource('kategori', KategoryBarangController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('user', UserController::class);

        Route::resource('identitas', IdentitasController::class);
        Route::post('save_identitas', [IdentitasController::class, 'update'])->name('save_identitas');
        Route::get('download_report', [GuruController::class, 'xls_report'])->name('download_report');
    });

    Route::prefix('app')->name('app.')->group(function () {
        Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
        Route::get('cetak_tagihan/{id}', [TransaksiController::class, 'cetak_tagihan'])->name('transaksi');

        Route::get('return_transaksi', [TransaksiController::class, 'return_transaksi'])->name('return_transaksi');
        Route::get('pelunasan', [PelunasanController::class, 'index'])->name('pelunasan');
        Route::get('pelunasan_berhasil/{id}', [PelunasanController::class, 'pelunasan_berhasil'])->name('pelunasan_berhasil');
        Route::get('pelunasan_detail/{id}', [PelunasanController::class, 'pelunasan_detail'])->name('pelunasan_detail');
        Route::get('pelunasan_detail_pdf/{id}', [PelunasanController::class, 'pelunasan_detail_pdf'])->name('pelunasan_detail_pdf');

        Route::get('penagihan', [PenagihanController::class, 'index'])->name('penagihan');

        Route::post('save_transaksi', [TransaksiController::class, 'save_transaksi'])->name('save_transaksi');
        Route::get('detail_transaksi/{id}', [TransaksiController::class, 'detail_transaksi'])->name('detail_transaksi');

        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('cetak_barcode/{id}', [TransaksiController::class, 'cetakBarcode'])->name('cetakBarcode');
            Route::get('cetak_kwitansi/{id}', [TransaksiController::class, 'cetak_kwitansi'])->name('cetak_kwitansi');
            Route::post('get_barang', [TransaksiController::class, 'get_barang'])->name('get_barang');
            Route::get('syarat_ketentuan/{id}', [TransaksiController::class, 'syarat_ketentuan'])->name('syarat_ketentuan');
// action update
            Route::get('update_transaksi', [TransaksiController::class, 'update_transaksi'])->name('update_transaksi');
            Route::post('action_update_transaksi', [TransaksiController::class, 'action_update_transaksi'])->name('action_update_transaksi');

        });
    });
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('pegadaian', [LaporanPegadaianController::class, 'index'])->name('pegadaian');
        Route::get('detaildata/{id}', [LaporanPegadaianController::class, 'show'])->name('detaildata');
        Route::get('pelunasan', [PelunasanController::class, 'laporan_pelunasan'])->name('pendapatan');
        Route::get('pendapatan', [LaporanPendapatanController::class, 'index'])->name('pendapatan');

    });
    Route::prefix('proses')->name('proses.')->group(function () {
        Route::get('pegadaian', [LaporanPegadaianController::class, 'proses_pegadaian'])->name('pendapatan');
        Route::get('pelunasan', [PelunasanController::class, 'proses_pelunasan'])->name('pendapatan');
        // Route::get('pendapatan', [LaporanPendapatanController::class, 'proses_pendapatan'])->name('pendapatan');
    });
    // api  route datatable
    Route::prefix('api')->name('api.')->group(function () {
        Route::post('barang', [BarangController::class, 'api'])->name('barang');
        Route::post('cabang', [CabangController::class, 'api'])->name('cabang');
        Route::post('pelunasan', [PelunasanController::class, 'api'])->name('pelunasan');
        Route::post('nasabah_belum_lunas', [PelunasanController::class, 'nasabah_belum_lunas'])->name('nasabah_belum_lunas');
        Route::post('perhitungan_biaya', [PerhitunganBiayaController::class, 'api'])->name('perhitungan_biaya');

        Route::post('kategori', [KategoryBarangController::class, 'api'])->name('kategori');
        Route::post('nasabah', [NasabahController::class, 'api'])->name('nasabah');
        // api
        Route::post('laporan_pegadaian', [LaporanPegadaianController::class, 'api'])->name('laporan_pegadaian');
        Route::post('pendapatan', [LaporanPendapatanController::class, 'api'])->name('pendapatan');
        Route::post('call_detail_transaction', [PelunasanController::class, 'getDetail'])->name('call_detail_transaction');
        Route::post('call_detail_nasabah', [TransaksiController::class, 'call_detail_nasabah'])->name('call_detail_nasabah');
        Route::post('user', [UserController::class, 'api'])->name('user');
        Route::post('action_pelunasan', [PelunasanController::class, 'action_pelunasan'])->name('action_pelunasan');

    });
    Route::post('jenis_show/{id}', [GuruController::class, 'carijenis'])->name('jenis_show');
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('laporan_presensi', [SiswaPresensiController::class, 'laporan_presensi'])->name('laporan_presensi');
        Route::post('delete_presensi', [SiswaPresensiController::class, 'destroy'])->name('delete_presensi');

        Route::get('pegawai', [PegawaiController::class, 'laporan_pegawai'])->name('pegawai');
        Route::get('siswa', [SiswaController::class, 'laporan_siswa'])->name('siswa');
    });

    Route::prefix('routing')->name('routing.')->group(function () {
        Route::get('export_db', [HomeController::class, 'export_db'])->name('export_db');
        Route::post('api_table', [HomeController::class, 'getFileList'])->name('api_table');
        Route::post('actioexport_db', [HomeController::class, 'actioexport_db'])->name('actioexport_db');

    });
});

Auth::routes();
