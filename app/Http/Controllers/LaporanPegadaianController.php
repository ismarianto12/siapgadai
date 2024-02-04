<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPegadaianController extends Controller
{

    protected $request;
    protected $route;
    protected $view;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->date = date("Y-m-d");
        $this->view = '.laporan_pegadaian.';
        $this->route = 'laporan.pegadaian.';
    }
    public function index()
    {
        $title = 'Laporan Pegadaian';
        return view($this->view . "index", compact("title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function api()
    {

        $dari = $this->request->input("dari");
        $sampai = $this->request->input("sampai");
        $data = transaksi::select(
            'transaksi_gadai.id as id_transaksi',
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
            'transaksi_gadai.jumlah_pinjaman as jumlah_diambil',
            'transaksi_gadai.jumlah_pinjaman',
            'transaksi_gadai.taksiran_harga',
            'transaksi_gadai.persentase_pinjaman as pinjam_persen',

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
            'transaksi_gadai.cabang_id',
            'transaksi_gadai.perhitungan_biaya_id',
            'transaksi_gadai.status_transaksi',

            'transaksi_gadai.no_imei',
            'transaksi_gadai.created_at as tanggal_transaksi_gadai',

            'barang.type',
            'barang.keluaran',
            'barang.merk',
            'barang.created_at',
            'barang.kode',
            'barang.kategori_barang_id',
            'barang.id',
            'barang.Kelengkapan',
            'barang.user_id',
            'barang.nama_barang',
            'barang.updated_at',
            'nasabah.no_anggota',
            'nasabah.kelurahan',
            'nasabah.tttl',
            'nasabah.nik',
            'nasabah.alamat',
            'nasabah.jk',
            'nasabah.no_hp as no_handphone',
            'nasabah.foto',
            'nasabah.rt_rw',
            'nasabah.kab_kota',
            'nasabah.nama',
            'nasabah.kecamatan',
            'perhitungan_biaya.keterangan as durasi_pinjam',
            'perhitungan_biaya.persentase as persentase_pinjaman',
            'users.username',
            'cabang.nama_cabang'
        )
            ->leftJoin('users', 'users.id', '=', 'transaksi_gadai.user_id')
            ->leftJoin('cabang', 'users.cabang_id', '=', 'cabang.id')

            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->where('transaksi_gadai.status_transaksi', '!=', 3);

        if (Auth::user()->tmlevel_id != '1') {
            $data->where('transaksi_gadai.cabang_id', Auth::user()->cabang_id);

        }
        if ($dari != '' && $sampai != '') {
            $data->whereBetween('transaksi_gadai.created_at', [$dari, $sampai]);
        }
        $sql = $data->get();
        return DataTables::of($sql)
            ->editColumn('action', function ($p) {
                return '<a to="' . route('laporan.detaildata', $p->id_transaksi) . '" class="btn btn-warning btn-xs" id="edit"><i class="
                flaticon-user-4"></i>detail </a> ';

            }, true)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Laporan Pegadaian';
        $data = transaksi::getDetailTransaction($id);
        return view($this->view . "detail_data", compact("title", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan_pegadaian $laporan_pegadaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan_pegadaian $laporan_pegadaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan_pegadaian $laporan_pegadaian)
    {
        //
    }
}
