<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_gadai';
    public $incrementing = false;
    public $datetime = false;

    protected $guarded = [];


    public static function getDetailTransaction($id)
    {
        return transaksi::select(
            'transaksi_gadai.pelunasan',
            'transaksi_gadai.keluaran_tahun',
            'transaksi_gadai.imei',
            'transaksi_gadai.merk',
            'transaksi_gadai.durasi_pelunasan',
            'transaksi_gadai.foto_barang',
            'transaksi_gadai.updated_at',
            'transaksi_gadai.no_kwitansi',
            'transaksi_gadai.id_nasabah',
            'transaksi_gadai.referal_code',
            'transaksi_gadai.user_id',
            'transaksi_gadai.jatuh_tempo',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.id',
            'transaksi_gadai.perpajangan',
            'transaksi_gadai.jasa_titip',
            'transaksi_gadai.total',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.maks_pinjaman',
            'transaksi_gadai.created_at',
            'transaksi_gadai.menyetujui_staff_sgi',
            'transaksi_gadai.no_anggota',
            'transaksi_gadai.administrasi',
            'transaksi_gadai.no_faktur',
            'transaksi_gadai.tanggal',
            'barang.type',
            'barang.keluaran',
            'barang.merk',
            'barang.created_at',
            'barang.no_imei',
            'barang.kode',
            'barang.kategori_barang_id',
            'barang.id',
            'barang.Kelengkapan',
            'barang.user_id',
            'barang.nama_barang',
            'barang.updated_at',
            'nasabah.no_anggota',
            'nasabah.id',
            'nasabah.kelurahan',
            'nasabah.tttl',
            'nasabah.nik',
            'nasabah.alamat',
            'nasabah.jk',
            'nasabah.foto',
            'nasabah.rt_rw',
            'nasabah.kab_kota',
            'nasabah.nama',
            'nasabah.kecamatan'
        )

            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->where('transaksi_gadai.id', $id)->firstOrfail();

    }
}
