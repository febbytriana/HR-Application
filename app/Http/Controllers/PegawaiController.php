<?php

namespace App\Http\Controllers;

use App\Pegawai;
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
        $pegawai = \App\Pegawai::all();
        return view('pegawais.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = \App\Jabatan::all();
        return view('pegawais.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->nik = $request->nik;
        $pegawai->nama = $request->nama;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->ttl = $request->ttl;
        $pegawai->alamat = $request->alamat;
        $pegawai->jk = $request->jk;
        $pegawai->agama = $request->agama;
        $pegawai->warga_negara = $request->warga_negara;
        $pegawai->status_kawin = $request->status_kawin;
        $pegawai->goldar = $request->goldar;
        $pegawai->penyakit = $request->penyakit;
        $pegawai->telp = $request->telp;
        $pegawai->email = $request->email;
        $pegawai->image = $request->image;
        $image = time().'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('/public/upload'), $image);
        $pegawai->save();

        session()->flash('success-create', 'Data Akun berhasil disimpan');
           
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
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
