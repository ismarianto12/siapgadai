<?php

namespace App\Http\Controllers;

use App\Models\laporan_pegadaian;
use Illuminate\Http\Request;

class LaporanPegadaianController extends Controller
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
        $this->view = '.laporan_pegadaian.';
        $this->route = 'laporan.pegadaian.';
    }
    public function index()
    {
        $title = 'Laporan Pegadaian';
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
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function show(laporan_pegadaian $laporan_pegadaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan_pegadaian $laporan_pegadaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan_pegadaian $laporan_pegadaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan_pegadaian  $laporan_pegadaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan_pegadaian $laporan_pegadaian)
    {
        //
    }
}
