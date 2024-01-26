<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

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

        $idTransaction = $id;
        $data = transaksi::getDetailTransaction($id);
        $title = 'Transaksi Berhasil';
        return view($this->view . 'detail_transaksi', compact('data', 'title', 'idTransaction'));
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */

    function cetak_kwitansi($id)
    {

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $backgroundImage = asset('assets/img/logo.png'); // replace with the actual path to your image
        $mpdf->SetWatermarkImage($backgroundImage);
        $mpdf->showWatermarkImage = true;

        $mpdf->SetTitle('Cetak Kwitansi');
        $data = transaksi::getDetailTransaction($id);
        $render = view($this->view . 'cetak_kwitansi', compact('data'));
        $mpdf->WriteHTML($render);
        return $mpdf->Output();

    }

    function syarat_ketentuan($id)
    {


        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $backgroundImage = asset('assets/img/logo.png'); // replace with the actual path to your image
        $mpdf->SetWatermarkImage($backgroundImage);
        $mpdf->showWatermarkImage = true;
        $mpdf->SetTitle('Syarat dan Ketentuan');
        $data = transaksi::getDetailTransaction($id);
        $render = view($this->view . 'syarat_ketentuan', compact('data'));
        $mpdf->WriteHTML($render);
        return $mpdf->Output();

    }



    public function destroy(transaksi $transaksi)
    {
        //
    }
}
