<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->date = date("Y-m-d");
        $this->view = '.transaksi.';
        $this->route = 'app.transaksi.';
    }

    public function detail_transaksi($id)
    {

        $idTransaction = $id;
        $data = transaksi::getDetailTransaction($id);

        // dd($data);
        $title = 'Transaksi Berhasil';
        return view($this->view . 'detail_transaksi', compact('data', 'title', 'idTransaction'));
    }
    public function index()
    {
        $akses = Auth::user()->tmlevel_id;
        if ($akses === '1') {
            return Properti_app::notFound();
        } else {
            $title = 'Transaksi';
            return view($this->view . "index", compact("title"));
        }
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

    public function cetakBarcode($id)
    {

        $data = transaksi::getDetailTransaction($id);
        return view($this->view . "barcode_cetak", compact("id", "data"));

    }

    public function save_transaksi()
    {

        $checkNokwitansi = \DB::table('transaksi_gadai')->where('no_kwitansi', $this->request->no_kwitansi)->get();
        if ($checkNokwitansi->count() > 0) {
            return response()->json([
                // 'idtransaksi' => $idtransaksi,
                'messages' => 'Gagal nomor anggota dan nomor kwitansi sudah ada sebelumnya silahkan coba yang lain.',
            ], 400);
            die();
        }
        $CheckNasabah = DB::table('nasabah')->where('nik', $this->request->nik)->get();
        if ($CheckNasabah->count() < 0) {
            $checkAnggota = \DB::table('nasabah')->where('no_anggota', $this->request->no_anggota)->get();
            if ($checkAnggota->count() > 0) {
                return response()->json([
                    // 'idtransaksi' => $idtransaksi,
                    'messages' => 'Gagal nomor anggota sudah ada sebelumnya silahkan coba yang lain.',
                ], 400);
                die();
            }
        }

        DB::beginTransaction();
        $id = Auth::user()->id;
        $tgl = Carbon::now()->format('y-m-d');

        $ext = $this->request->file('foto_barang');
        if ($ext) {
            $setname = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
            $ext->move('./file_gadai/', $setname);
        } else {
            $setname = "";
        }
        $foto_ktp = $this->request->file('foto_ktp');
        if ($foto_ktp) {
            $foto_ktpname = rand(122, 333) . '-' . $tgl . '.' . $foto_ktp->getClientOriginalExtension();
            $foto_ktp->move('./file_gadai/', $foto_ktpname);
        } else {
            $foto_ktpname = '';
        }
        try {
            $CheckNasabah = DB::table('nasabah')->where('nik', $this->request->nik)->get();
            if ($CheckNasabah->count() > 0) {
                $first_trasaksi = [
                    'status_transaksi'=> $this->request->status_nasabah,
                    'kategori_barang_id' => $this->request->kategori_barang_id,
                    'imei' => $this->request->imei,
                    'perhitungan_biaya_id' => $this->request->perhitungan_biaya_id,
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
                    'taksiran_harga' => Properti_app::removeTag($this->request->taksiran_harga),
                    'id_nasabah' => $CheckNasabah->first()->id,
                    'jasa_titip' => $this->request->jasa_titip,
                    'persentase_pinjaman' => $this->request->persentase_pinjaman,
                    'jumlah_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    'total' => $this->request->total,
                    'merek_barang' => $this->request->merek_barang,
                    'cabang_id' => Auth::user()->cabang_id,
                    'maks_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    'no_kwitansi' => $this->request->no_kwitansi,
                    'tanggal_jatuh_tempo' => $this->request->tgl_jatuh_tempo,
                    'referal_code' => $this->request->referal_code,
                    'type' => $this->request->type,
                    'tujuan_gadai' => $this->request->tujuan_gadai,
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_id' => Auth::user()->id,
                ];
                $idtransaksi = \DB::table('transaksi_gadai')->insertGetId($first_trasaksi);
            } else {
                $nasabah = [
                    'cabang_id' => Auth::user()->cabang_id,
                    'no_anggota' => $this->request->no_anggota,
                    'foto_ktp' => $foto_ktpname,
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
                    'status_transaksi'=> $this->request->status_nasabah,
                    'kategori_barang_id' => $this->request->kategori_barang_id,
                    'perhitungan_biaya_id' => $this->request->perhitungan_biaya_id,
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
                    'taksiran_harga' => Properti_app::removeTag($this->request->taksiran_harga),
                    'id_nasabah' => $lastInsertedId,
                    'jasa_titip' => $this->request->jasa_titip,
                    'persentase_pinjaman' => $this->request->persentase_pinjaman,
                    'jumlah_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    'total' => $this->request->total,
                    'merek_barang' => $this->request->merek_barang,
                    'cabang_id' => Auth::user()->cabang_id,
                    'maks_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    'no_kwitansi' => $this->request->no_kwitansi,
                    'tanggal_jatuh_tempo' => $this->request->tgl_jatuh_tempo,
                    'referal_code' => $this->request->referal_code,
                    'type' => $this->request->type,
                    'tujuan_gadai' => $this->request->tujuan_gadai,
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_id' => Auth::user()->id,
                ];
                $idtransaksi = \DB::table('transaksi_gadai')->insertGetId($trasaksi);
            }
            \DB::commit();
            return response()->json([
                'idtransaksi' => $idtransaksi,
                'messages' => 'data berhasil disimpan',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'messages' => $e->getMessage(),
            ], 500);

        }
    }
    public function return_transaksi()
    {
        $akses = Auth::user()->tmlevel_id;
        if ($akses != '1') {
            return response()->json([
                'akses menu ini tidak bisa diakases oleh operator / kasir.',
            ]);
        }
        $title = 'Return Transaction';
        return view($this->view . 'return_transaksi', compact('title'));

    }

    public function cetak_kwitansi($id)
    {

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $backgroundImage = asset('./assets/img/logo.png'); // replace with the actual path to your image
        $mpdf->SetWatermarkImage($backgroundImage);
        $mpdf->showWatermarkImage = true;

        $mpdf->SetTitle('Cetak Kwitansi');
        $data = transaksi::getDetailTransaction($id);
        $render = view($this->view . 'cetak_kwitansi', compact('data'))->render();
        $mpdf->WriteHTML($render);

        return response($mpdf->Output("cetak_kwitansi.pdf", 'I'))
            ->header('Content-Type', 'application/pdf');

    }

    public function syarat_ketentuan($id)
    {

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $backgroundImage = asset('./assets/img/logo.png'); // replace with the actual path to your image
        $mpdf->SetWatermarkImage($backgroundImage);
        $mpdf->showWatermarkImage = true;
        $mpdf->SetTitle('Syarat dan Ketentuan');
        $data = transaksi::getDetailTransaction($id);
        $render = view($this->view . 'syarat_ketentuan', compact('data'))->render();
        $mpdf->WriteHTML($render);
        return response($mpdf->Output("syarat_ketentuan.pdf", 'I'))
            ->header('Content-Type', 'application/pdf');

    }

    public function destroy(transaksi $transaksi)
    {
        //
    }
    public function call_detail_nasabah()
    {
        $id_nasabah = $this->request->nasabah_d;
        $data = \DB::table('nasabah')->where('id', $id_nasabah)->get();
        return response()->json(['data' => $data]);

    }

    public function cetak_tagihan($id)
    {

        // $idTransaction = $id;
        // $data = transaksi::getDetailTransaction($id);
        // $title = 'Transaksi Berhasil';
        $data = transaksi::getDetailTagihan($id);
        if ($data->status_transaksi != 3) {
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
            $backgroundImage = asset('./assets/img/logo.png'); // replace with the actual path to your image
            $mpdf->SetWatermarkImage($backgroundImage);
            $mpdf->showWatermarkImage = true;
            $mpdf->SetTitle('Syarat dan Ketentuan');
            $render = view($this->view . 'cetak_tagihan', compact('data'))->render();
            $mpdf->WriteHTML($render);
            return response($mpdf->Output("cetak_tagihan_transaksi.pdf", 'I'))
                ->header('Content-Type', 'application/pdf');
        } else {
            return response()->json([
                'messages' => 'data nasabah ini sudah lunas',
            ]);
        }
    }

    public function valiateNotransaksi()
    {
    }

    public function validateNoanggota()
    {

    }
    public function get_barang()
    {
        try {
            $id = $this->request->id;
            $data = \DB::table('barang')->where('kategori_barang_id', $id)->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([]);
        }
    }
    public function update_transaksi()
    {
        $title = 'Edit Transaksi';
        $data = [];
        return view("update_transaksi.index", compact("title", "data"));
    }
    public function action_update_transaksi()
    {
        $idTransaksi = $this->request->id_transaksi;
        $dtransaksi = DB::table('transaksi_gadai')->where('id', $idTransaksi)->first();
        $dnasabah = DB::table('nasabah')->where('id', $dtransaksi->id_nasabah)->first();
        // get id transaction
        $checkNokwitansi = \DB::table('transaksi_gadai')->where('no_kwitansi', $dtransaksi->no_kwitansi)->get();
        // if ($checkNokwitansi->count() > 0) {
        //     return response()->json([
        //         'messages' => 'Gagal nomor anggota dan nomor kwitansi sudah ada sebelumnya silahkan coba yang lain.',
        //     ], 400);
        //     die();
        // }
        $CheckNasabah = DB::table('nasabah')->where('nik', $dnasabah->nik)->get();
        if ($CheckNasabah->count() < 0) {
            $checkAnggota = \DB::table('nasabah')->where('no_anggota', $dtransaksi->no_anggota)->get();
            if ($checkAnggota->count() > 0) {
                return response()->json([
                    'messages' => 'Gagal nomor anggota sudah ada sebelumnya silahkan coba yang lain.',
                ], 400);
                die();
            }
        }
        DB::beginTransaction();
        $id = Auth::user()->id;
        $tgl = Carbon::now()->format('y-m-d');
        $ext = $this->request->file('foto_barang');
        if ($ext) {
            $setname = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
            $ext->move('./file_gadai/', $setname);
        } else {
            $setname = "";
        }
        $foto_ktp = $this->request->file('foto_ktp');
        if ($foto_ktp) {
            $foto_ktpname = rand(122, 333) . '-' . $tgl . '.' . $foto_ktp->getClientOriginalExtension();
            $foto_ktp->move('./file_gadai/', $foto_ktpname);
        } else {
            $foto_ktpname = '';
        }
        try {
            $CheckNasabah = DB::table('nasabah')->where('nik', $dnasabah->nik)->get();
            if ($CheckNasabah->count() > 0) {
                $first_trasaksi = [
                    // 'kategori_barang_id' => $this->request->kategori_barang_id,
                    // 'imei' => $this->request->imei,
                    // 'perhitungan_biaya_id' => $this->request->perhitungan_biaya_id,
                    // 'menyetujui_nasabah' => $this->request->menyetujui_nasabah,
                    // 'menyetujui_staff_sgi' => $this->request->menyetujui_staff_sgi,
                    // 'durasi_pelunasan' => $this->request->durasi_pelunasan,
                    // 'perpajangan' => $this->request->perpajangan,
                    // 'keluaran_tahun' => $this->request->keluaran_tahun,
                    // 'administrasi' => Properti_app::removeTag($this->request->administrasi),
                    // 'no_imei' => $this->request->no_imei,
                    // 'kelengkapan' => $this->request->kelengkapan,
                    // 'foto_barang' => $setname,
                    // 'updated_at' => $this->request->updated_at,
                    // 'id_barang' => $this->request->id_barang,
                    // 'no_faktur' => $this->request->no_faktur,
                    // 'user_id' => $this->request->user_id,
                    // 'no_anggota' => $this->request->no_anggota,
                    // 'pelunasan' => $this->request->pelunasan,
                    // 'taksiran_harga' => Properti_app::removeTag($this->request->taksiran_harga),
                    // 'id_nasabah' => $CheckNasabah->first()->id,
                    // 'jasa_titip' => $this->request->jasa_titip,
                    // 'persentase_pinjaman' => $this->request->persentase_pinjaman,
                    // 'jumlah_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    // 'total' => $this->request->total,
                    // 'merek_barang' => $this->request->merek_barang,
                    // 'cabang_id' => Auth::user()->cabang_id,
                    // 'maks_pinjaman' => Properti_app::removeTag($this->request->inputmaksimal_pinjam),
                    // 'no_kwitansi' => $this->request->no_kwitansi,
                    // 'tanggal_jatuh_tempo' => $this->request->tgl_jatuh_tempo,
                    // 'referal_code' => $this->request->referal_code,
                    // 'type' => $this->request->type,
                    // 'tujuan_gadai' => $this->request->tujuan_gadai,
                    'created_at' => $this->request->created_at ? $this->request->created_at : date('Y-m-d H:i:s'),
                    'user_id' => Auth::user()->id,
                ];
                $idtransaksi = \DB::table('transaksi_gadai')->where('id', $dtransaksi->id)->update($first_trasaksi);
            } else {
                $nasabah = [
                    'cabang_id' => Auth::user()->cabang_id,
                    'no_anggota' => $this->request->no_anggota,
                    'foto_ktp' => $foto_ktpname,
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
                $lastInsertedId = \DB::table('nasabah')->where('id', $dnasabah->id)->update($nasabah);
                $transaksi = [
                    // 'kategori_barang_id' => $this->request->kategori_barang_id,
                    // 'perhitungan_biaya_id' => $this->request->perhitungan_biaya_id,
                    // 'imei' => $this->request->imei,
                    // 'menyetujui_nasabah' => $this->request->menyetujui_nasabah,
                    // 'menyetujui_staff_sgi' => $this->request->menyetujui_staff_sgi,
                    // 'durasi_pelunasan' => $this->request->durasi_pelunasan,
                    // 'perpajangan' => $this->request->perpajangan,
                    // 'keluaran_tahun' => $this->request->keluaran_tahun,
                    // 'administrasi' => Properti_app::removeTag($this->request->administrasi),
                    // 'no_imei' => $this->request->no_imei,
                    // 'kelengkapan' => $this->request->kelengkapan,
                    // 'foto_barang' => $setname,
                    // 'updated_at' => $this->request->updated_at,
                    // 'id_barang' => $this->request->id_barang,
                    // 'no_faktur' => $this->request->no_faktur,
                    // 'user_id' => $this->request->user_id,
                    // 'no_anggota' => $this->request->no_anggota,
                    // 'pelunasan' => $this->request->pelunasan,
                    // 'taksiran_harga' => Properti_app::removeTag($this->request->taksiran_harga),
                    // 'id_nasabah' => $lastInsertedId,
                    // 'jasa_titip' => $this->request->jasa_titip,
                    // 'persentase_pinjaman' => $this->request->persentase_pinjaman,
                    // 'jumlah_pinjaman' => Properti_app::removeTag($this->request->jumlah_diambil),
                    // 'total' => $this->request->total,
                    // 'merek_barang' => $this->request->merek_barang,
                    // 'cabang_id' => Auth::user()->cabang_id,
                    // 'maks_pinjaman' => Properti_app::removeTag($this->request->inputmaksimal_pinjam),
                    // //'no_kwitansi' => $this->request->no_kwitansi,
                    // 'tanggal_jatuh_tempo' => $this->request->tgl_jatuh_tempo,
                    // 'referal_code' => $this->request->referal_code,
                    // 'type' => $this->request->type,
                    // 'tujuan_gadai' => $this->request->tujuan_gadai,
                    'created_at' => $this->request->created_at ? $this->request->created_at : date('Y-m-d H:i:s'),
                    'user_id' => Auth::user()->id,
                ];
                \DB::table('transaksi_gadai')->where('id', $dtransaksi)->update($transaksi);
            }
            \DB::commit();
            return response()->json([
                'messages' => 'data berhasil ubah',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'messages' => $e->getMessage(),
            ], 500);

        }

    }
}
