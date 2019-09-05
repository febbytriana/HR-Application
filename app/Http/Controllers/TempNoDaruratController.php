<?php

namespace App\Http\Controllers;

use App\TempNoDarurat;
use App\Pegawai;
use App\NoDarurat;

use Illuminate\Http\Request;

class TempNoDaruratController extends Controller
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
     * @param  \App\TempNoDarurat  $tempNoDarurat
     * @return \Illuminate\Http\Response
     */
    public function show(TempNoDarurat $tempNoDarurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempNoDarurat  $tempNoDarurat
     * @return \Illuminate\Http\Response
     */
    public function edit(TempNoDarurat $tempNoDarurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempNoDarurat  $tempNoDarurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempNoDarurat $tempNoDarurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempNoDarurat  $tempNoDarurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempNoDarurat $tempNoDarurat)
    {
        //
    }

    public function indexpegawai($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $checktemp = TempNoDarurat::where('id_pegawai',$id_pegawai)->count();
        $darurat = NoDarurat::where('id_pegawai',$id_pegawai)->get();

        return view('no-darurat.index',compact('pegawai','darurat','checktemp'));
    }

    public function createtemp($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);

        return view('no-darurat.createtemp',compact('pegawai'));
    }

    public function storetemp(Request $req,$id_pegawai)
    {
        $darurat = new TempNoDarurat;

        $darurat->id_pegawai = $id_pegawai;
        $darurat->nama = $req->nama;
        $darurat->nomor = $req->nomor;
        $darurat->status = $req->status;

        $darurat->save();

        return redirect('pegawai/nodarurat/index/'.$id_pegawai);
    }
}
