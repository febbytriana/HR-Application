<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use DB;
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
        $jabatan = \App\Jabatan::all();
        return view('pegawais.pegawai', compact('pegawai','jabatan'));
    }
     /**
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
        $pegawai->nik = $req->nik;
        $pegawai->nama = $req->nama;
        $pegawai->id_jabatan = $req->id_jabatan;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->alamat = $req->alamat;
        $pegawai->jk = $req->jk;
        $pegawai->agama = $req->agama;
        $pegawai->warga_negara = $req->warga_negara;
        $pegawai->status_kawin = $req->status_kawin;
        $pegawai->goldar = $req->goldar;
        $pegawai->penyakit = $req->penyakit;
        $pegawai->telp = $req->telp;
        $pegawai->email = $req->email;
        $pegawai->image = $req->image;
        $image = time().'.'.$req->image->getClientOriginalExtension();

        $req->image->move(public_path('/public/upload'), $image);
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
    public function show($id_pegawai)
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
        return view('pegawais/edit',compact('pegawai','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
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

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $pegawai->image = $filename;
        }

        $pegawai->save();

        session()->flash('success-create', 'Data Akun berhasil diedit');
           
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

        return redirect('/pegawai/index');
    }
<<<<<<< HEAD
    public function profil($id_pegawai)
    {
        
        $pegawai = \App\Pegawai::find($id_pegawai);
        $pendidikan = \App\Pendidikan::all();
        return view('pegawais.detail', compact('pegawai','pendidikan'));
    }
=======
>>>>>>> origin/master

    public function detail($id_pegawai)
    {
        $pegawai = Pegawai::where('id_pegawai','=',$id_pegawai)->get();

        return view('pegawais/detail',compact('pegawai'));
    }

}
