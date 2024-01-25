<?php

namespace App\Http\Controllers;

use App\Helpers\Properti_app;
use App\Models\Tmpendapatan;
use App\Models\User;
use App\Tmidentitas_app;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $route = 'aplikasi.';
    protected $view = 'identitas.';
    protected $title = 'Pendapatan SKPD';

    public function __construct()
    {
    }

    public function index()
    {

        return view($this->view . '.index', []);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_skpd' => 'required|unique:tmskpd,kode_skpd',
            'namaskpd' => 'required|unique:tmskpd,namaskpd',
            'alamat' => 'required',
        ]);
        Tmidentitas_app::find($id)->update($request->all());
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