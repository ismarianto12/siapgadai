<?php

namespace App\Http\Controllers;

use App\Models\penagihan;
use Illuminate\Http\Request;

class PenagihanController extends Controller
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
        $this->view = '.penagihan.';
        $this->route = 'app.penagihan.';
    }
    public function index()
    {
        $title = 'Penagihan';
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
     * @param  \App\Models\penagihan  $penagihan
     * @return \Illuminate\Http\Response
     */
    public function show(penagihan $penagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penagihan  $penagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(penagihan $penagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penagihan  $penagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penagihan $penagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penagihan  $penagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penagihan $penagihan)
    {
        //
    }
}
