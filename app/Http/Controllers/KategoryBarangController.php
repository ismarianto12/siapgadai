<?php

namespace App\Http\Controllers;

use App\Models\kategoryBarang;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KategoryBarangController extends Controller
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
        $this->view = '.kategori.';
        $this->route = 'master.kategori.';
    }
    public function index()
    {
        $title = 'Master Kategori';
        return view($this->view . "index", compact("title"));
    }


    function create()
    {
        $title = 'Tambah Cabang';
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
        //
    }

    function api()
    {
        $data = DB::table('kategori_barang')
            ->select(
                'kategori_barang.id',
                'kategori_barang.kode_kategori',
                'kategori_barang.nama_kategori',
                'users.name as name_user'
            )
            ->join('users', 'kategori_barang.user_id', '=', 'users.id', 'left')

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
    public function edit(cabang $cabang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cabang $cabang)
    {
        //
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
