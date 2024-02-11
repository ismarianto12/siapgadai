<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_gadai';
    public $incrementing = false;
    public $datetime = false;

    protected $guarded = [];

    public static function Chartdata($status = '')
    {

        $year = date('Y');
        $result = DB::table('transaksi_gadai as b')
            ->selectRaw('
        SUM(CASE WHEN MONTH(b.created_at) = 1 THEN 1 ELSE 0 END) AS Januari,
        SUM(CASE WHEN MONTH(b.created_at) = 2 THEN 1 ELSE 0 END) AS Februari,
        SUM(CASE WHEN MONTH(b.created_at) = 3 THEN 1 ELSE 0 END) AS Maret,
        SUM(CASE WHEN MONTH(b.created_at) = 4 THEN 1 ELSE 0 END) AS April,
        SUM(CASE WHEN MONTH(b.created_at) = 5 THEN 1 ELSE 0 END) AS Mei,
        SUM(CASE WHEN MONTH(b.created_at) = 6 THEN 1 ELSE 0 END) AS Juni,
        SUM(CASE WHEN MONTH(b.created_at) = 7 THEN 1 ELSE 0 END) AS Juli,
        SUM(CASE WHEN MONTH(b.created_at) = 8 THEN 1 ELSE 0 END) AS Agustus,
        SUM(CASE WHEN MONTH(b.created_at) = 9 THEN 1 ELSE 0 END) AS September,
        SUM(CASE WHEN MONTH(b.created_at) = 10 THEN 1 ELSE 0 END) AS Oktober,
        SUM(CASE WHEN MONTH(b.created_at) = 11 THEN 1 ELSE 0 END) AS November,
        SUM(CASE WHEN MONTH(b.created_at) = 12 THEN 1 ELSE 0 END) AS Desember
    ')
            ->whereYear('b.created_at', $year)
            ->groupBy(DB::raw('YEAR(b.created_at), MONTH(b.created_at)'));
        if (Auth::user()->tmlevel_id != '1') {
            if ($status == 'lunas') {
                $sql = $result->where('b.status_transaksi', '=', '3')->where('b.cabang_id', Auth::user()->cabang_id)->get();
            } else {
                $sql = $result->where('b.cabang_id', Auth::user()->cabang_id)->get();
            }

        } else {
            if ($status == 'lunas') {
                $sql = $result->where('b.status_transaksi', '=', '3')->get();
            } else {
                $sql = $result->get();
            }
        }
        return $sql;
    }

    public static function getDetailTagihan($id)
    {
        return transaksi::select(
            'transaksi_gadai.id',
            'transaksi_gadai.pelunasan',
            'transaksi_gadai.keluaran_tahun',
            'transaksi_gadai.imei',
            'transaksi_gadai.merek_barang',
            'transaksi_gadai.durasi_pelunasan',
            'transaksi_gadai.foto_barang',
            'transaksi_gadai.updated_at',
            'transaksi_gadai.no_kwitansi',
            'transaksi_gadai.id_nasabah',
            'transaksi_gadai.referal_code',
            'transaksi_gadai.user_id',
            'transaksi_gadai.tanggal_jatuh_tempo',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.perpajangan',
            'transaksi_gadai.jasa_titip',
            'transaksi_gadai.tujuan_gadai',
            'transaksi_gadai.total',
            'transaksi_gadai.taksiran_harga',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.kelengkapan',
            'transaksi_gadai.maks_pinjaman',
            'transaksi_gadai.persentase_pinjaman',
            'transaksi_gadai.created_at',
            'transaksi_gadai.menyetujui_staff_sgi',
            'transaksi_gadai.no_anggota',
            'transaksi_gadai.administrasi',
            'transaksi_gadai.no_faktur',
            'transaksi_gadai.no_imei',
            'transaksi_gadai.cabang_id',
            'transaksi_gadai.merek_barang',
            'transaksi_gadai.type',

            'barang.keluaran',
            'barang.merk',
            'barang.created_at',
            'barang.kode',
            'barang.kategori_barang_id',
            // 'barang.id',
            'barang.user_id',
            'barang.nama_barang',
            'barang.updated_at',
            'nasabah.no_anggota',
            // 'nasabah.id',
            'nasabah.kelurahan',
            'nasabah.tttl',
            'nasabah.nik',
            'nasabah.alamat',
            'nasabah.jk',
            'nasabah.no_hp',
            'nasabah.foto',
            'nasabah.rt_rw',
            'nasabah.kab_kota',
            'nasabah.nama',
            'nasabah.kecamatan',
            'perhitungan_biaya.kode',
            'perhitungan_biaya.keterangan',
            'perhitungan_biaya.persentase',
            'perhitungan_biaya.user_id',
            'perhitungan_biaya.created_at',
            'perhitungan_biaya.updated_at',
            'perhitungan_biaya.status_transaksi',
            'perhitungan_biaya.status_bayar',

        )

            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->where('transaksi_gadai.status_transaksi', '!=', '3')
            ->where('transaksi_gadai.id', $id)
            ->firstOrfail();
    }
    public static function getDetailTransaction($id)
    {
        return transaksi::select(
            'transaksi_gadai.id',
            'transaksi_gadai.pelunasan',
            'transaksi_gadai.keluaran_tahun',
            'transaksi_gadai.imei',
            'transaksi_gadai.merek_barang',
            'transaksi_gadai.durasi_pelunasan',
            'transaksi_gadai.foto_barang',
            'transaksi_gadai.updated_at',
            'transaksi_gadai.no_kwitansi',
            'transaksi_gadai.id_nasabah',
            'transaksi_gadai.referal_code',
            'transaksi_gadai.user_id',
            'transaksi_gadai.tanggal_jatuh_tempo',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.perpajangan',
            'transaksi_gadai.jasa_titip',
            'transaksi_gadai.tujuan_gadai',
            'transaksi_gadai.total',
            'transaksi_gadai.taksiran_harga',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.kelengkapan',
            'transaksi_gadai.maks_pinjaman',
            'transaksi_gadai.persentase_pinjaman',
            'transaksi_gadai.created_at',
            'transaksi_gadai.menyetujui_staff_sgi',
            'transaksi_gadai.no_anggota',
            'transaksi_gadai.administrasi',
            'transaksi_gadai.no_faktur',
            'transaksi_gadai.no_imei',
            'transaksi_gadai.cabang_id',
            'transaksi_gadai.merek_barang',
            'transaksi_gadai.type',

            'barang.keluaran',
            'barang.merk',
            'barang.created_at',
            'barang.kode',
            'barang.kategori_barang_id',
            // 'barang.id',
            'barang.user_id',
            'barang.nama_barang',
            'barang.updated_at',
            'nasabah.no_anggota',
            // 'nasabah.id',
            'nasabah.kelurahan',
            'nasabah.tttl',
            'nasabah.nik',
            'nasabah.alamat',
            'nasabah.jk',
            'nasabah.no_hp',
            'nasabah.foto',
            'nasabah.rt_rw',
            'nasabah.kab_kota',
            'nasabah.nama',
            'nasabah.kecamatan',
            'perhitungan_biaya.kode',
            'perhitungan_biaya.keterangan',
            'perhitungan_biaya.persentase',
            'perhitungan_biaya.user_id',
            'perhitungan_biaya.created_at',
            'perhitungan_biaya.updated_at',
            'perhitungan_biaya.status_transaksi',
            'perhitungan_biaya.status_bayar',
            'kategori_barang.nama_kategori',

        )
            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('kategori_barang', 'kategori_barang.id', '=', 'barang.kategori_barang_id')
            ->where('transaksi_gadai.id', $id)->firstOrfail();
    }
}
