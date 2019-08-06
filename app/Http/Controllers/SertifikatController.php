<?php

namespace App\Http\Controllers;

use App\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawais.sertifikat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pegawai)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        return view('pegawais.sertifikat.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id_pegawai)
    {
        $sertifikat = new Sertifikat();
        $sertifikat->id_pegawai = $req->id_pegawai;
        $sertifikat->nama_event = $req->nama_event;
        $sertifikat->tahun_event = $req->tahun_event;
        $sertifikat->ket_prestasi = $req->ket_prestasi;
        if($req->hasfile('gambar_sertifikat')){
            $file = $req->file('gambar_sertifikat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/sertifikat/', $filename);
            $sertifikat->gambar_sertifikat = $filename;
        }
        $sertifikat->save();


        return redirect('pegawai/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function show(Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        $sertifikat = \App\Sertifikat::find($id_sertifikat);
        return view('pegawais.sertifikat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sertifikat $sertifikat)
    {
        //
    }
}
