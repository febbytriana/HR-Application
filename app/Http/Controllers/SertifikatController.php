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
        $file       = $req->file('gambar_sertifikat');
        $fileName   = $file->getClientOriginalName();
        $req->file('gambar_sertifikat')->move("upload/", $fileName);
        $sertifikat->gambar_sertifikat = $fileName;
        $sertifikat->save();


        return redirect('pegawai/detail/'.$id_pegawai);
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
    public function edit($id_pegawai,$id_sertifikat)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        $sertifikat = \App\Sertifikat::find($id_sertifikat);
        return view('pegawais.sertifikat.edit',compact('pegawai','sertifikat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id_pegawai,$id_sertifikat)
    {
        //
        $sertifikat = Sertifikat::find($id_sertifikat);
        $sertifikat->nama_event = $req->nama_event;
        $sertifikat->tahun_event = $req->tahun_event;
        $sertifikat->ket_prestasi = $req->ket_prestasi;
        if($req->hasfile('gambar_sertifikat')) {
        $file       = $req->file('gambar_sertifikat');
        $fileName   = $file->getClientOriginalName();
        $req->file('gambar_sertifikat')->move("upload/", $fileName);
        $sertifikat->gambar_sertifikat = $fileName;
        }
        $sertifikat->save();


        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai,$id_sertifikat)
    {
        //
        $sertifikat = Sertifikat::find($id_sertifikat);
        $sertifikat->delete();

        return redirect('/pegawai/detail/'.$id_pegawai);
    }
}
