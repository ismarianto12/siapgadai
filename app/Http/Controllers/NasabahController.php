<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{

    protected $request;
    protected $route;
    protected $view;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->date = date("Y-m-d");
        $this->view = '.nasabah.';
        $this->route = 'app.nasabah.';
    }
    public function index()
    {
        //
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
     * @param  \App\Models\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show(nasabah $nasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit(nasabah $nasabah)
    {
        //
    }

    public function update(Request $request, $id)
    {
    }
    public function api()
    {
        $dari = $this->request->dari;
        $sampai = $this->request->sampai;
        $data = DB::table('nasabah')
            ->select(
                'nasabah.id',
                'nasabah.no_anggota',
                'nasabah.no_hp',
                'nasabah.nik',
                'nasabah.nama',
                'nasabah.foto',
                'nasabah.jk',
                'nasabah.tttl',
                'nasabah.alamat',
                'nasabah.rt_rw',
                'nasabah.kelurahan',
                'nasabah.kecamatan',
                'nasabah.kab_kota',
                'nasabah.foto_ktp'
            );

        $sql = $data->where('nasabah.cabang_id',
            Auth::user()->cabang_id
        )->get();
        return DataTables::of($sql)
            ->editColumn('id', function ($p) {
                return "<input type='checkbox' name='cbox[]' value='" . $p->id . "' />";
            })
            ->editColumn('action', function ($p) {
                return '<a href="" class="checkpelunasan btn btn-warning btn-xs" id="edit" data-nasabah_id="' . $p->id . '"><i class="fa fa-list"></i>Pilih Nasbah </a>';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['usercreate', 'action', 'id'])
            ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy(nasabah $nasabah)
    {
        //
    }
}
