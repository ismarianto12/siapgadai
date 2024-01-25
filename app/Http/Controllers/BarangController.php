<?php

namespace App\Http\Controllers;

use App\Models\barang;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{

    protected $request;
    protected $route;
    protected $view;
    function __construct(Request $request)
    {
        $this->request = $request;
        $this->date = date("Y-m-d");
        $this->view = '.barang.';
        $this->route = 'master.barang.';
    }
    public function index()
    {
        $title = 'Master barang';
        return view($this->view . "index", compact("title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Barang';
        return view($this->view . "form_add", compact("title"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "kategori_barang_id|required",
                "kode|required",
                "nama_barang|required",
                "merk|required",
                "type|required",
                "keluaran|required",
                "Kelengkapan|required"
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
        $data = new barang;
        $data->kategori_barang_id = $this->request->kategori_barang_id;
        $data->kode = $this->request->kode;
        $data->nama_barang = $this->request->nama_barang;
        $data->no_imei = $this->request->no_imei;
        $data->merk = $this->request->merk;
        $data->type = $this->request->type;
        $data->keluaran = $this->request->keluaran;
        $data->Kelengkapan = $this->request->Kelengkapan;
        $data->created_at = $this->request->created_at;
        $data->updated_at = $this->request->updated_at;
        $data->user_id = $this->request->user_id;
        $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    public function api(barang $barang)
    {
        $data = DB::table('barang')
            ->select(
                'barang.id',
                'barang.kategori_barang_id',
                'barang.kode',
                'barang.nama_barang',
                'barang.merk',
                'barang.type',
                'barang.keluaran',
                'barang.Kelengkapan',
                'barang.created_at',
                'barang.updated_at',
                'barang.user_id',
                'users.username',
                'users.name as name_user'
            )
            ->join('kategori_barang', 'barang.kategori_barang_id', '=', 'kategori_barang.id', 'left')
            ->join('users', 'barang.user_id', '=', 'users.id', 'left')

            ->get();
        return DataTables::of($data)
            ->editColumn('id', function ($p) {
                return "<input type='checkbox' name='cbox[]' value='" . $p->id . "' />";
            })
            ->editColumn('action', function ($p) {
                return '<a href="" class="btn btn-warning btn-xs" id="edit" data-id="' . $p->id . '"><i class="fa fa-edit"></i>Edit </a> ';
            }, true)

            ->addIndexColumn()
            ->rawColumns(['usercreate', 'action', 'id'])
            ->toJson();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Barang';
        $data = barang::find($id);
        return view($this->view . "form_add", compact("title", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                "kategori_barang_id|required",
                "kode|required",
                "nama_barang|required",
                "merk|required",
                "type|required",
                "keluaran|required",
                "Kelengkapan|required"
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
        $data = barang::find($id);
        $data->kategori_barang_id = $this->request->kategori_barang_id;
        $data->kode = $this->request->kode;
        $data->nama_barang = $this->request->nama_barang;
        $data->no_imei = $this->request->no_imei;
        $data->merk = $this->request->merk;
        $data->type = $this->request->type;
        $data->keluaran = $this->request->keluaran;
        $data->Kelengkapan = $this->request->Kelengkapan;
        $data->created_at = $this->request->created_at;
        $data->updated_at = $this->request->updated_at;
        $data->user_id = $this->request->user_id;
        $data->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        try {
            if (is_array($this->request->id)) {
                DB::table('barang')->whereIn('id', $this->request->id)->delete();
            } else {
                DB::table('barang')->whereid($this->request->id)->delete();
            }
            return response()->json([
                'status' => 1,
                'msg' => 'Data berhasil di hapus',
            ]);
        } catch (\DB $t) {
            return response()->json([
                'status' => 2,
                'msg' => $t,
            ]);
        }
    }
}
