<?php

namespace App\Http\Controllers;

use App\NoDarurat;
use App\Pegawai;
use Illuminate\Http\Request;

class NoDaruratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pegawai)
    {
        //
        $pegawai = \App\Pegawai::find($id_pegawai);
        return view('no-darurat.create',compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id_pegawai)
    {
        //
        $darurat = new NoDarurat;
        $darurat->id_pegawai = $id_pegawai;
        $darurat->nama = $req->nama;
        $darurat->nomor = $req->nomor;
        $darurat->status = $req->status;

        $darurat->save();

        session()->flash('success-create', 'Nomor Darurat berhasil disimpan');
        
        return redirect('/pegawai/detail/'.$id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NoDarurat  $noDarurat
     * @return \Illuminate\Http\Response
     */
    public function show(NoDarurat $noDarurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NoDarurat  $noDarurat
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai,$id_no_darurat)
    {
        //
        $darurat = NoDarurat::find($id_no_darurat);
        $pegawai = Pegawai::find($id_pegawai);
        return view('no-darurat.edit',compact('darurat','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NoDarurat  $noDarurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_pegawai,$id_no_darurat)
    {
        //
        $darurat = NoDarurat::find($id_no_darurat);
        $darurat->nama = $req->nama;
        $darurat->nomor = $req->nomor;
        $darurat->status = $req->status;

        $darurat->save();

        session()->flash('success-create', 'Nomor Darurat berhasil diubah');
        
        return redirect('/pegawai/detail/'.$id_pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NoDarurat  $noDarurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai,$id_no_darurat)
    {
        //
        $darurat = NoDarurat::find($id_no_darurat);
        $darurat->delete();

        return redirect('/pegawai/detail/'.$id_pegawai);
    }
}
