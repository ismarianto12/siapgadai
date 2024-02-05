<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelunasan extends Model
{
    use HasFactory;
    protected $table = 'pelunasan';
    public $incrementing = false;
    public $datetime = false;
    protected $guarded = [];

    public static function detailPelunasan($id)
    {

        return pelunasan::select(

            'pelunasan.jasa_titip',
            'pelunasan.id_nasabah',
            'pelunasan.perhitungan_biaya_id',
            'pelunasan.transaksi_id',
            'pelunasan.dibayarkan',
            'pelunasan.updated_at',
            'pelunasan.bukti_bayar',
            'pelunasan.user_id',
            'pelunasan.id_transaksi',
            'pelunasan.id',
            'pelunasan.created_at',
            'pelunasan.pokok',
            'pelunasan.bunga',
            'barang.nama_barang',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.no_imei',
            'transaksi_gadai.perpajangan',
            'transaksi_gadai.taksiran_harga',
            'transaksi_gadai.jasa_titip',
            'transaksi_gadai.durasi_pelunasan',
            'transaksi_gadai.type',
            'transaksi_gadai.id_nasabah',
            'transaksi_gadai.no_faktur',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.imei',
            'transaksi_gadai.pelunasan',
            'transaksi_gadai.id_barang',
            'transaksi_gadai.referal_code',
            'transaksi_gadai.no_kwitansi',
            'transaksi_gadai.keluaran_tahun',
            'transaksi_gadai.administrasi',
            'transaksi_gadai.cabang_id',
            'transaksi_gadai.merek_barang',
            'transaksi_gadai.total',
            'transaksi_gadai.persentase_pinjaman',
            'transaksi_gadai.no_anggota',
            'transaksi_gadai.user_id',
            'transaksi_gadai.updated_at',
            'transaksi_gadai.maks_pinjaman',
            'transaksi_gadai.status_transaksi',
            'transaksi_gadai.kelengkapan',
            'transaksi_gadai.tanggal_jatuh_tempo',
            'transaksi_gadai.foto_barang',
            'transaksi_gadai.tujuan_gadai',
            'transaksi_gadai.perhitungan_biaya_id',
            'transaksi_gadai.created_at',
            'transaksi_gadai.menyetujui_staff_sgi',
            'perhitungan_biaya.keterangan as durasi_pinjam',
            // 'perhitungan_biaya.persentase as persentase_pinjaman',
            'nasabah.nama',
            'nasabah.nik',
            'nasabah.jk',
            'nasabah.alamat',
            'nasabah.rt_rw',
            'nasabah.kelurahan',
            'nasabah.kecamatan',
            'nasabah.kab_kota',

            'nasabah.alamat',
            'nasabah.no_hp as no_handphone',
            'users.id as id_user',
            'users.username  as nama_user',
            'cabang.nama_cabang'
            // 'users.name as nama_user'

        )
            ->join('transaksi_gadai', 'transaksi_gadai.id', '=', 'pelunasan.transaksi_id')
            ->join('users', 'pelunasan.user_id', '=', 'users.id', 'left')
            ->leftJoin('cabang', 'users.cabang_id', '=', 'cabang.id')
            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->where('transaksi_gadai.status_transaksi', '=', '3')
            ->where('pelunasan.id', $id)
            ->firstOrfail();
    }
}
