<?php

namespace App\Http\Controllers;

use App\PengalamanKerja;
use App\Pegawai;
use App\TempPengalamanKerja;
use Illuminate\Http\Request;


class PengalamanKerjaController extends Controller
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
        return view('pengalaman.create',compact('pegawai'));
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
        $pengalaman = new PengalamanKerja;
        $pengalaman->id_pegawai = $id_pegawai;
        $pengalaman->nama_perusahaan = $req->nama_perusahaan;
        $pengalaman->jabatan = $req->jabatan;
        $tahun = "$req->lama $req->format";
        $pengalaman->tahun = $tahun;

        $pengalaman->save();

        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function show(PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai,$id_pengalaman)
    {
        //
        $pegawai = Pegawai::find($id_pegawai);
        $pengalaman = PengalamanKerja::find($id_pengalaman);
        if(count($pegawai) && count($pengalaman) > 0) {
        return view('pengalaman.edit',compact('pegawai','pengalaman'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id_pegawai,$id_pengalaman)
    {
        //
        $pengalaman = PengalamanKerja::find($id_pengalaman) ?? abort(404);
        $pengalaman->nama_perusahaan = $req->nama_perusahaan;
        $pengalaman->jabatan = $req->jabatan;
        $tahun = "$req->lama $req->format";
        $pengalaman->tahun = $tahun;

        $pengalaman->save();

        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id_pegawai,$id_pengalaman)
    {
        //
        $pengalaman = PengalamanKerja::find($id_pengalaman) ?? abort(404);
        $pengalaman->delete();
        
        return redirect('pegawai/detail/'.$id_pegawai);
    }

}
