<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\Pegawai;
use Illuminate\Http\Request;

class PelatihanController extends Controller
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
        $pegawai = Pegawai::find($id_pegawai);

        return view('pelatihan.create',compact('pegawai')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req,$id_pegawai)
    {
        //
        $pelatihan = new Pelatihan;
        $pelatihan->id_pegawai = $id_pegawai;
        $pelatihan->nama_event = $req->nama_event;
        $pelatihan->tempat_pelatihan = $req->tempat_pelatihan;
        $pelatihan->tanggal = $req->tanggal;
        $pelatihan->peran = $req->peran;

        $pelatihan->save();

        return redirect('pegawai/pelatihan/index/'.$id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai,$id_pelatihan)
    {
        //
        $pegawai = Pegawai::find($id_pegawai);
        $pelatihan = Pelatihan::find($id_pelatihan);

        return view('pelatihan.edit',compact('pegawai','pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_pegawai,$id_pelatihan)
    {
        //
        $pelatihan = Pelatihan::find($id_pelatihan);
        $pelatihan->nama_event = $req->nama_event;
        $pelatihan->tempat_pelatihan = $req->tempat_pelatihan;
        $pelatihan->tanggal = $req->tanggal;
        $pelatihan->peran = $req->peran;

        $pelatihan->save();

        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai,$id_pelatihan)
    {
        //
        $pelatihan = Pelatihan::find($id_pelatihan);
        $pelatihan->delete();

        return redirect('pegawai/detail/'.$id_pegawai);
    }
}
