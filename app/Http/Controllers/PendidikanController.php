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
        $pendidikan = Pendidikan::where('id_pegawai',$id_pegawai)->first();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pegawai)
    {
        $check = Pendidikan::where('id_pegawai',$id_pegawai)->count();
        if($check > 0){
            $pendidikan = Pendidikan::find($id_pegawai);
            $pendidikan->sd = $request->sd;
            $pendidikan->lulus_sd = $request->lulus_sd;
            $pendidikan->smp = $request->smp;
            $pendidikan->lulus_smp = $request->lulus_smp;
            $pendidikan->smk = $request->smk;
            $pendidikan->lulus_smk = $request->lulus_smk;
            $pendidikan->nama_universitas = $request->nama_universitas;
            $pendidikan->tingkat_pt = $request->tingkat_pt;
            $pendidikan->lulus_pt = $request->lulus_pt;
            $pendidikan->id_pegawai = $request->id_pegawai;
            $pendidikan->save();
            return redirect('/pegawai/detail/'.$id_pegawai); 
        } else {
            $pendidikan = new Pendidikan;
            $pendidikan->sd = $request->sd;
            $pendidikan->lulus_sd = $request->lulus_sd;
            $pendidikan->smp = $request->smp;
            $pendidikan->lulus_smp = $request->lulus_smp;
            $pendidikan->smk = $request->smk;
            $pendidikan->lulus_smk = $request->lulus_smk;
            $pendidikan->nama_universitas = $request->nama_universitas;
            $pendidikan->tingkat_pt = $request->tingkat_pt;
            $pendidikan->lulus_pt = $request->lulus_pt;
            $pendidikan->id_pegawai = $request->id_pegawai;
            $pendidikan->save();
            return redirect('/pegawai/detail/'.$id_pegawai); 
        }
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
