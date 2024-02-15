<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $route = 'aplikasi.';
    protected $view = '.identitas.';
    protected $title = 'Pendapatan SKPD';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $data = \DB::table('identitas_app')->first();
        $title = "Identitas Aplikasi";
        return view('identitas', compact('data', 'title'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        try {
            $parsing = [
                'nama_perusahaan' => $this->request->nama_perusahaan,
                'alamat_lengkap' => $this->request->alamat_lengkap,
                'fax' => $this->request->fax,
                'email' => $this->request->email,
                'telp' => $this->request->telp,
                'bisnis_owner' => $this->request->bisnis_owner,
                'user_id' => $this->request->user_id,
                'created_at' => $this->request->created_at,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            DB::table('identitas_app')->where('kode', 1)->update($parsing);
            return response()->json([
                'messages' => "data berhasil di update",
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
            ],400);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //get api data

    public function notifopd(Request $request)
    {
        return response()->json(0);
    }
}
