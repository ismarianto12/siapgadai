<?php

namespace App\Http\Controllers;


use App\Models\pelunasan;
use App\Models\transaksi;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PelunasanController extends Controller
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
        $this->view = '.pelunasan.';
        $this->route = 'app.cabang.';
    }
    public function index()
    {
        $title = 'Pelunasan';
        $data = [];
        return view($this->view . "index", compact("title", "data"));
    }
    public function laporan_pelunasan()
    {
        $title = 'Pelunasan';
        $data = [];
        return view($this->view . "laporan_pelunasan", compact("title", "data"));
    }
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
     * @param  \App\Models\pelunasan  $pelunasan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = transaksi::getDetailTransaction($id);
        $title = 'Detail data transaksi';
        return view($this->view . "pelunasan_detail", compact("data"));
    }
    public function edit(pelunasan $pelunasan)
    {
        //
    }
    function api()
    {

        $dari = $this->request->input("dari");
        $sampai = $this->request->input("sampai");

        $data = DB::table("pelunasan")->select(

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
            'perhitungan_biaya.persentase as persentase_pinjaman',
            'nasabah.nama',
            'nasabah.no_anggota',
            'nasabah.alamat',
            'nasabah.no_hp as no_handphone'

        )
            ->join('transaksi_gadai', 'transaksi_gadai.id', '=', 'pelunasan.transaksi_id')
            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->where('transaksi_gadai.status_transaksi', '=', '3');

        if ($dari && $sampai) {
            $data->whereBetween('transaksi_gadai.created_at', [$dari, $sampai]);
        }
        $sql = $data->get();

        return DataTables::of($sql)
            ->editColumn('action', function ($p) {
                return '<a to="' . Url('laporan/pelunasan_detail/' . $p->id) . '" class="btn btn-success btn-xs" id="edit"><i class="
                flaticon-user-4"></i>Detail pelunasan </a> ';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }


    public function action_pelunasan()
    {

        $transaksiId = $this->request->id_transaksi;
        $datatransac = DB::table('transaksi_gadai')->where('id', $transaksiId)->first();

        $pelunasan = DB::table('pelunasan')->where('id_transaksi', $transaksiId)->get();
        $pendapatan = DB::table('pendapatan')->where('id_transaksi', $transaksiId)->get();

        if ($pelunasan->count() > 0 && $pendapatan->count() > 0) {
            return response()->json([
                'messagess' => 'gagal data pelunasan sudah di posting'
            ], 500);
        }

        DB::beginTransaction();
        $id_user = Auth::user()->id;
        $tgl = Carbon::now()->format('y-m-d');
        if ($this->request->file('bukti_bayar')) {
            $ext = $this->request->file('bukti_bayar');
            $bukti_bayar = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
            $ext->move('./bukti_bayar/', $bukti_bayar);
        } else {
            $bukti_bayar = '';
        }



        try {
            $pelunasan = [
                'id_nasabah' => $datatransac->id_nasabah,
                'transaksi_id' => $datatransac->id,
                'perhitungan_biaya_id' => $datatransac->perhitungan_biaya_id,
                'pokok' => \Properti_app::removeTag($this->request->diabayarkan),
                'bunga' => 0,
                'jasa_titip' => 0,
                'bukti_bayar' => $bukti_bayar,
                'user_id' => $id_user,
                'created_at' => $tgl,
                'updated_at' => $tgl,
            ];
            $lastInsertedId = \DB::table('pelunasan')->insertGetId($pelunasan);
            $pendapatan = [
                'pelunasan_id' => $lastInsertedId,
                'id_nasabah' => $datatransac->id_nasabah,
                'transaksi_id' => $datatransac->id,
                'perhitungan_biaya_id' => $datatransac->perhitungan_biaya_id,
                'pokok' => \Properti_app::removeTag($this->request->diabayarkan),
                'bunga' => 0,
                'jasa_titip' => 0,
                // 'bukti_bayar' => $bukti_bayar,
                'user_id' => $id_user,
                'created_at' => $tgl,
                'updated_at' => $tgl,
            ];
            $idtransaksi = \DB::table('pendapatan')->insertGetId($pendapatan);
            \DB::table('transaksi_gadai')->where([
                'id' => $transaksiId
            ])->update([
                        'status_transaksi' => '3'
                    ]);
            \DB::commit();
            return response()->json([
                'idtransaksi' => $idtransaksi,
                'messages' => 'data berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);

        }

    }

    function pelunasan_detail($id)
    {
        $idTransaction = $id;
        $data = transaksi::getDetailTransaction($id);
        $title = 'Pelunasan Transaksi';
        return view($this->view . 'pelunasan_detail', compact('data', 'title', 'idTransaction'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelunasan  $pelunasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {


        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelunasan  $pelunasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelunasan $pelunasan)
    {
        //
    }

    function getDetail()
    {

        $idtransaksi = $this->request->transaksi_id;
        $data = transaksi::getDetailTransaction($idtransaksi);
        return response()->json(['data' => $data, 'messages' => "request hasben successfully."]);

    }
    function pelunasan_berhasil($id)
    {
        $title = 'Pelunasan Berhasil';
        $data = [];
        $idTransaction = $id;
        return view($this->view . "pelunasan_berhasil", compact("title", "data", "idTransaction"));
    }
}