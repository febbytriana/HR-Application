<?php

namespace App\Http\Controllers;

use App\Keluarga;
use App\Pegawai;

use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluargas = Keluarga::all();
        $pegawais = Pegawai::all();

        return view('keluargas/index', compact('keluargas','pegawais'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keluarga = Keluarga::all();

        return view('keluargas/create', compact('keluarga'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $keluarga = new Keluarga;
        $keluarga->id_pegawai = $req->id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->status = $req->status;

        $keluarga->save();
        return redirect('/keluarga/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        $pegawai = Pegawai::all();
        return view('keluargas/edit', compact('keluarga','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $keluarga = Keluarga::find($req->id_keluarga);
        $keluarga->id_pegawai = $req->id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->status = $req->status;

        $keluarga->save();
        return redirect('/keluarga/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        $keluarga->delete();

        return redirect()->back(); 
    }
}
