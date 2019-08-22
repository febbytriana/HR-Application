x<?php

namespace App\Http\Controllers;

use App\TempPegawai;
use App\Pegawai;

use Illuminate\Http\Request;

class TempPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();

        $temppegawais = TempPegawai::all();

        return view('pegawais/index', compact('pegawais','temppegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $temppegawai = Pegawai::all();

        return view('pegawais/create',compact('temppegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $temppegawai = new TempPegawai;
        $temppegawai->id_pegawai = $req->id_pegawai;
        $temppegawai->nama = $req->nama;
        $temppegawai->jk = $req->jk;
        $temppegawai->tempat = $req->tempat;
        $temppegawai->tgl = $req->tgl;
        $temppegawai->agama = $req->agama;

        $temppegawai->save();
        return redirect('/pegawai/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
public function show(Temp_Pegawai $temp_Pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id_temp_pegawai)
    {
        $temppegawai = TempPegawai::find($id_temp_pegawai);
        $pegawai = Pegawai::all();
        return view('pegawai/edit', compact('pegawai','temppegawai'));/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        
        $temppegawai = TempPegawai::find($req->id_temp_pegawai);
        $temppegawai->id_pegawai = $req->id_pegawai;
        $temppegawai->nama = $req->nama;
        $temppegawai->jk = $req->jk;
        $temppegawai->tempat = $req->tempat;
        $temppegawai->tgl = $req->tgl;
        $temppegawai->agama = $req->agama;

        $temppegawai->save(); 
        return redirect('/pegawai/index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temp_Pegawai  $temp_Pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_temp_pegawai)
    {
        $temppegawai = TempPegawai::find($id_temp_pegawai);
        $temppegawai->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }
}
