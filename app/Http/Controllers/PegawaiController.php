<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();

        return view('pegawais/index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pegawais/create', compact('jabatan'));
    }

    public function detail()
    {
        return view('pegawais/detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pegawai = new Pegawai;
        $pegawai->nama = $req->nama;
        $pegawai->jk = $req->jk;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->agama = $req->agama;
        $pegawai->id_jabatan = $req->id_jabatan;
        
        $pegawai->save();       
        return redirect('/pegawai/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $jabatan = Jabatan::all();
        return view('pegawai/edit',compact('pegawai','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $pegawai = Pegawai::find($req->id_pegawai);

        $pegawai->nama = $req->nama;
        $pegawai->jk = $req->jk;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->agama = $req->agama;
        $pegawai->id_jabatan = $req->id_jabatan;
        
        
        $pegawai->save();       
        return redirect('/pegawai/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $pegawai->delete();

        return redirect()->back();
    }
}
