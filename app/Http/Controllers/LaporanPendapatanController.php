<?php

namespace App\Http\Controllers;

use App\Models\laporan_pendapatan;
use Illuminate\Http\Request;

class LaporanPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $route;
    protected $view;
    function __construct(Request $request)
    {
        $this->request = $request;
        $this->date = date("Y-m-d");
        $this->view = '.laporan_pendapatan.';
        $this->route = 'laporan.pendapatan.';
    }
    public function index()
    {
        $title = 'Laporan Pendapatan';
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
     * @param  \App\Models\laporan_pendapatan  $laporan_pendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan_pendapatan $laporan_pendapatan)
    {
        //
    }

    function api()
    {

        $dari = $this->request->input("dari");
        $sampai = $this->request->input("sampai");

        $data = transaksi::select(
            'transaksi_gadai.id',
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
            'transaksi_gadai.tanggal_jatuh_tempo',
            'transaksi_gadai.jumlah_pinjaman as jumlah_diambil',
            'transaksi_gadai.jumlah_pinjaman',

            'transaksi_gadai.perpajangan',
            'transaksi_gadai.jasa_titip',
            'transaksi_gadai.total',
            'transaksi_gadai.menyetujui_nasabah',
            'transaksi_gadai.maks_pinjaman',
            'transaksi_gadai.tujuan',
            'transaksi_gadai.created_at',
            'transaksi_gadai.menyetujui_staff_sgi',
            'transaksi_gadai.no_anggota',
            'transaksi_gadai.administrasi',
            'transaksi_gadai.no_faktur',
            'transaksi_gadai.cabang_id',
            'transaksi_gadai.no_imei',
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
            'nasabah.id',
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
        )

            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id');
        if ($dari && $sampai) {
            $data->whereBetween('transaksi_gadai.created_at', [$dari, $sampai]);
        }
        $sql = $data->get();
        return DataTables::of($data)
            ->editColumn('action', function ($p) {
                return '<a href="" class="btn btn-warning btn-xs" id="edit" data-id="' . $p->id . '"><i class="
                flaticon-user-4"></i>detail </a> ';

            }, true)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan_pendapatan  $laporan_pendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan_pendapatan $laporan_pendapatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan_pendapatan  $laporan_pendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan_pendapatan $laporan_pendapatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan_pendapatan  $laporan_pendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan_pendapatan $laporan_pendapatan)
    {
        //
    }
}
