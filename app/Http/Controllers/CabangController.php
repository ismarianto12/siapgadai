<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CabangController extends Controller
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
        $this->view = '.cabang.';
        $this->route = 'master.cabang.';
    }
    public function index()
    {
        $title = 'Master Cabang';
        return view($this->view . "index", compact("title"));
    }


    function create()
    {
        $title = 'Tambah Cabang';
        return view($this->view . "form_add", compact("title"));

    }


    function api()
    {
        $data = DB::table('cabang')
            ->select(
                'cabang.id',
                'cabang.kode_cabang',
                'cabang.nama_cabang',
                'cabang.alamat_cabang',
                // 'cabang'
                'users.name as name_user'
            )
            ->join('users', 'cabang.user_id', '=', 'users.id', 'left')

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
     * Display the specified resource.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show(cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Tambah Cabang';
        $data = \DB::table('cabang')->where('id', $id)->first();
        return view($this->view . "form_edit", compact("title", "data","id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::table("cabang")->insert([
                'nama_cabang' => $request->nama_cabang,
                'no_telp' => $request->no_telp,
                'alamat_cabang' => $request->alamat_cabang,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'spv_cabang' => $request->spv_cabang,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $request->user_id,
                'kode_cabang' => $request->kode_cabang,
            ]);

            return response()->json([
                'message' => 'Data berhasil disimpan',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan data',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table("cabang")->where('id', $id)->update([
                'nama_cabang' => $request->nama_cabang,
                'no_telp' => $request->no_telp,
                'alamat_cabang' => $request->alamat_cabang,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'spv_cabang' => $request->spv_cabang,
                'updated_at' => now(),
                'user_id' => $request->user_id,
                'kode_cabang' => $request->kode_cabang,
            ]);

            return response()->json([
                'message' => 'Data berhasil diperbarui',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat memperbarui data',
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function destroy(cabang $cabang)
    {
        try {
            if (is_array($this->request->id)) {
                DB::table('cabang')->whereIn('id', $this->request->id)->delete();
            } else {
                DB::table('cabang')->whereid($this->request->id)->delete();
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
