<?php

namespace App\Http\Controllers;

use App\TempPegawai;

use Illuminate\Http\Request;

class TempPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = TempPegawai::all();

        return view('pegawais/index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawais/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pegawai = new TempPegawai;
        $pegawai->nama = $req->nama;
        $pegawai->jk = $req->jk;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->agama = $req->agama;

        $pegawai->save();
        return redirect('/pegawai/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Temp_Pegawai $temp_Pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Temp_Pegawai $temp_Pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temp_Pegawai $temp_Pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temp_Pegawai $temp_Pegawai)
    {
        //
    }
}
