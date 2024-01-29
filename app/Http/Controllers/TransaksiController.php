<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Properti_app;

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
                'jk' => $this->request->jenis_kelamin,
                'rt_rw' => $this->request->rt_rw,
                'kab_kota' => $this->request->kabupaten_kota,
                'nama' => $this->request->nama_nasabah,
                'kecamatan' => $this->request->kecamatan,
                'no_hp' => $this->request->no_hp,
            ];

            $lastInsertedId = \DB::table('nasabah')->insertGetId($nasabah);
            $trasaksi = [
                'imei' => $this->request->imei,
                'menyetujui_nasabah' => $this->request->menyetujui_nasabah,
                'menyetujui_staff_sgi' => $this->request->menyetujui_staff_sgi,
                'durasi_pelunasan' => $this->request->durasi_pelunasan,
                'perpajangan' => $this->request->perpajangan,
                'keluaran_tahun' => $this->request->keluaran_tahun,
                'administrasi' => Properti_app::removeTag($this->request->administrasi),
                'no_imei' => $this->request->no_imei,
                'kelengkapan' => $this->request->kelengkapan,
                'foto_barang' => $setname,
                'updated_at' => $this->request->updated_at,
                'id_barang' => $this->request->id_barang,
                'no_faktur' => $this->request->no_faktur,
                'user_id' => $this->request->user_id,
                'no_anggota' => $this->request->no_anggota,
                'pelunasan' => $this->request->pelunasan,
                'taksiran_harga' => $this->request->taksiran_harga,
                'id_nasabah' => $lastInsertedId,
                'jasa_titip' => $this->request->jasa_titip,
                'persentase_pinjaman' => $this->request->persentase_pinjaman,
                'jumlah_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                'total' => $this->request->total,
                'merek_barang' => $this->request->merek_barang,
                'cabang_id' => Auth::user()->cabang_id,
                'maks_pinjaman' => Properti_app::removeTag($this->request->inputmaksimal_pinjam),
                'no_kwitansi' => $this->request->no_kwitansi,
                'tanggal_jatuh_tempo' => $this->request->tgl_jatuh_tempo,
                'referal_code' => $this->request->referal_code,
                'type' => $this->request->type,
                'tujuan_gadai' => $this->request->tujuan_gadai,
                'created_at' => date('Y-m-d H:i:s'),

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

        }

    }
    function return_transaksi()
    {
        $title = 'Return Transaction';
        return view($this->view . 'return_transaksi', compact('title'));
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
