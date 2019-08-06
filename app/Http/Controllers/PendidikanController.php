<?php

namespace App\Http\Controllers;

use App\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_pegawai)
    {
        $pendidikan = \App\Pendidikan::find($id_pegawai);
        $pegawai = \App\Pegawai::find($id_pegawai);
        return view('pegawais.pendidikan.edit', compact('pegawai','pendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\req  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pendidikan = new Pendidikan;
        $pendidikan->sd = $req->sd;
        $pendidikan->lulus_sd = $req->lulus_sd;
        $pendidikan->smp = $req->smp;
        $pendidikan->lulus_smp = $req->lulus_smp;
        $pendidikan->smk = $req->smk;
        $pendidikan->lulus_smk = $req->lulus_smk;
        $pendidikan->nama_universitas = $req->nama_universitas;
        $pendidikan->tingkat_pt = $req->tingkat_pt;
        $pendidikan->lulus_pt = $req->lulus_pt;
        $pendidikan->id_pegawai = $req->id_pegawai;
        if($pendidikan->id_pendidikan == 0){
            $pendidikan->save();
        }else{
            $pendidikan->update();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\req  $req
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_pegawai)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        $pendidikan = $req->id_pendidikan;
        if($pendidikan == 0){
            \App\Pegawai::find($id_pegawai);
            \App\Pendidikan::create($req->all());

            return redirect('pegawai/index');
        }else{
            \App\Pegawai::find($id_pegawai);
            \App\Pendidikan::update($req->all());

            return redirect('pegawai/index');
        }
        return redirect('pegawai/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //
    }
}
