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
<<<<<<< HEAD
=======
        $keluargas = Keluarga::all();
        $pegawais = Pegawai::all();

        return view('keluargas/index', compact('keluargas','pegawais'));
>>>>>>> origin/master

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pegawai)
    {
<<<<<<< HEAD
        
        $pegawai = \App\Pegawai::find($id_pegawai);
        return view('keluargas.create',compact('pegawai'));
=======
        $pegawai = Pegawai::where('id_pegawai','=',$id_pegawai)->get();
        $keluarga = Keluarga::all();

        return view('keluargas/edit', compact('keluarga','pegawai'));

>>>>>>> origin/master
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store(Request $req, $id_pegawai)
    {
        $keluarga = new Keluarga;
        
        $keluarga->id_pegawai = $id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->jk = $req->jk;
        $keluarga->tempat = $req->tempat;
        $keluarga->tgl = $req->tgl;
        $keluarga->status = $req->status;

        $keluarga->save();

        session()->flash('success-create', 'Data Keluarga berhasil disimpan');
        return redirect('/pegawai/detail/'.$id_pegawai);
=======
    public function store(Request $req)
    {
        $keluarga = new Keluarga;
        $keluarga->nama = $req->nama;
        $keluarga->status = $req->status;

        $keluarga->save();
        return redirect('/keluarga/index');
>>>>>>> origin/master
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
<<<<<<< HEAD
    public function edit($id_pegawai,$id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        $pegawai = Pegawai::find($id_pegawai);
        return view('keluargas.edit',compact('keluarga','pegawai'));
=======
    public function edit($id_pegawai)
    {
        $keluarga = Keluarga::find($id_pegawai);
        $pegawai = Pegawai::all();
        return view('keluargas/edit', compact('keluarga','pegawai'));
>>>>>>> origin/master
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $req, $id_pegawai,$id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        $keluarga->id_pegawai = $req->id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->jk = $req->jk;
        $keluarga->tempat = $req->tempat;
        $keluarga->tgl = $req->tgl;
        $keluarga->status = $req->status;

        $keluarga->save();

        session()->flash('success-create', 'Data Keluarga berhasil diubah');
        
        return redirect('/pegawai/detail/'.$id_pegawai);
=======
    public function update(Request $req)
    {
        $pegawai = Pegawai::all();
        $keluarga = Keluarga::find($req->id_pegawai);
        $keluarga->id_pegawai = $req->id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->tempat = $req->tempat;
        $keluarga->tgl = $req->tgl;
        $keluarga->anak_ke = $req->anak_ke;
        $keluarga->status = $req->status;

        $keluarga->save();
        return redirect('/pegawai/detail');

>>>>>>> origin/master
    }

    /**
     * Remove the specified resource from storage.
<<<<<<< HEAD
     *s
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai, $id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        
        if($keluarga != null){
            $keluarga->delete();
             return redirect('/pegawai/detail/'.$id_pegawai);

        }

        return redirect('/pegawai/detail/'.$id_pegawai);
=======
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_keluarga)
    {
        $keluarga = Keluarga::find($id_keluarga);
        $keluarga->delete();

        return redirect()->back(); 
>>>>>>> origin/master
    }
}
