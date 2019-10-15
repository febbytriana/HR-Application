<?php

namespace App\Http\Controllers;

use App\KpiPegawai;
use Illuminate\Http\Request;

class KpiPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kpi = KpiPegawai::all();

        return view('kpipegawais/index',compact('kpi'));
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
     * @param  \App\KpiPegawai  $kpiPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(KpiPegawai $kpiPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KpiPegawai  $kpiPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiPegawai $kpiPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KpiPegawai  $kpiPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KpiPegawai $kpiPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KpiPegawai  $kpiPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(KpiPegawai $kpiPegawai)
    {
        //
    }
}
