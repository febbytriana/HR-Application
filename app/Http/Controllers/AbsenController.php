<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Absen;
use Auth;
use Response;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $id_user = Auth::user()->id;
        $pegawai = Pegawai::where('id_user', $id_user)->first();
        $id_pegawai = $pegawai['id_pegawai'];
        $dataabsen = Absen::select('id_pegawai')->where('id_pegawai', $id_pegawai)->get();

        $absen = Absen::all();
        $pegawais = Pegawai::all();

        return view('absen.index',compact('dataabsen','id_pegawai','absen','pegawai','pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pegawai)
    {
        $tanggal = date("d-m-y");

        $id_user = Auth::user()->id;
        $pegawai = Pegawai::select('id_pegawai')->where('id_user', $id_user)->first();
        $id_pegawai = $pegawai['id_pegawai'];


        $dataabsen = Absen::where('tgl',$tanggal)->where('id_pegawai', $id_pegawai)->get();

        $absen = Absen::all();
        $pegawais = Pegawai::all();

        return view('absen/create', compact('id_pegawai','dataabsen','absen','pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id_pegawai)
    {
        $absen = new Absen;

        $id_user = Auth::user()->id;
        $pegawai = Pegawai::select('id_pegawai')->where('id_user', $id_user)->first();
        $absen->id_pegawai = $id_pegawai;

        $absen->tgl = $req->tgl;
        $absen->keterangan = $req->keterangan;
        $absen->save();

        session()->flash('success-create', 'Data Absen berhasil disimpan');
        return redirect('/absen/index/'.$id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_absen)
    {
        $absen = Nilai::find($id_absen);
        return view('absens/edit', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $absen = Absen::find($req->id_absen);
        $absen->keterangan = $req->keterangan;
        $absen->save();
        session()->flash('success-create', 'Data Absen berhasil diubah');
        return redirect('/absen/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_absen)
    {
        $absen = Absen::find($id_absen);
        $absen->delete();
        return redirect()->back();
    }
}
