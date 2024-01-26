<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
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
        $this->view = '.transaksi.';
        $this->route = 'app.transaksi.';
    }
    public function index()
    {
        $title = 'Transaksi';
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
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    public function save_transaksi()
    {
        DB::beginTransaction();
        $id = Auth::user()->id;
        $tgl = Carbon::now()->format('y-m-d');
        $ext = $this->request->file('foto_barang');
        $setname = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
        $ext->move('./file_gadai/', $setname);
        try {
            $nasabah = [
                'no_anggota' => $this->request->no_anggota,
                'kelurahan' => $this->request->kelurahan,
                'tttl' => $this->request->tttl,
                'nik' => $this->request->nik,
                'alamat' => $this->request->alamat,
                'jk' => $this->request->jk,
                'rt_rw' => $this->request->rt_rw,
                'kab_kota' => $this->request->kab_kota,
                'nama' => $this->request->nama,
                'kecamatan' => $this->request->kecamatan,
            ];

            $lastInsertedId = \DB::table('nasabah')->insertGetId($nasabah);
            $trasaksi = [
                'imei' => $this->request->imei,
                'menyetujui_nasabah' => $this->request->menyetujui_nasabah,
                'menyetujui_staff_sgi' => $this->request->menyetujui_staff_sgi,
                'tanggal' => $this->request->tanggal,
                'durasi_pelunasan' => $this->request->durasi_pelunasan,
                'perpajangan' => $this->request->perpajangan,
                'keluaran_tahun' => $this->request->keluaran_tahun,
                'administrasi' => $this->request->administrasi,
                'foto_barang' => $setname,
                'updated_at' => $this->request->updated_at,
                'id_barang' => $this->request->id_barang,

                'no_faktur' => $this->request->no_faktur,
                'user_id' => $this->request->user_id,
                'no_anggota' => $this->request->no_anggota,
                'pelunasan' => $this->request->pelunasan,
                'id_nasabah' => $lastInsertedId,
                'jatuh_tempo' => $this->request->jatuh_tempo,
                'jasa_titip' => $this->request->jasa_titip,
                'jumlah_pinjaman' => $this->request->jumlah_pinjaman,
                'total' => $this->request->total,
                'merk' => $this->request->merk,
                'maks_pinjaman' => $this->request->maks_pinjaman,
                'created_at' => $this->request->created_at,
                'no_kwitansi' => $this->request->no_kwitansi,
                'referal_code' => $this->request->referal_code,
            ];
            $idtransaksi = \DB::table('transaksi_gadai')->insertGetId($trasaksi);
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

            // return "Error: " . $e->getMessage();
        }

    }

    public function detail_transaksi($id)
    {
        $datatransaksi = transaksi::select(
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
            ->where('transaksi_gadai.id', $id)->get();
        $title = 'Transaksi Berhasil';
        return view($this->view . 'detail_transaksi', compact('datatransaksi', 'title'));
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
