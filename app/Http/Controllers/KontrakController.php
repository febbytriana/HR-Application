<?php

namespace App\Http\Controllers;

use App\Kontrak;
use App\Pegawai;
use Illuminate\Http\Request;

class KontrakController extends Controller
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
        return view('kontrak.create',compact('pegawai'));
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
        $kontrak = new Kontrak;
        $kontrak->id_pegawai = $id_pegawai;
        $kontrak->kontrak = $req->kontrak;
        $mulai = strtotime($req->mulai); 
        $newmulai = date('d-m-Y',$mulai);
        $habis = strtotime($req->habis); 
        $newhabis = date('d-m-Y',$habis);
        $tahun = "$newmulai Sampai dengan $newhabis";
        $kontrak->tahun = $tahun;
        $kontrak->save();

        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai,$id_kontrak)
    {
        //
        $pegawai = Pegawai::find($id_pegawai);
        $kontrak = Kontrak::find($id_kontrak);
        return view('kontrak.edit',compact('pegawai','kontrak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_pegawai,$id_kontrak)
    {
        //
        $kontrak =  Kontrak::find($id_kontrak);
        $kontrak->kontrak = $req->kontrak;
        $mulai = strtotime($req->mulai); 
        $newmulai = date('d-m-Y',$mulai);
        $habis = strtotime($req->habis); 
        $newhabis = date('d-m-Y',$habis);
        $tahun = "$newmulai Sampai dengan $newhabis";
        $kontrak->tahun = $tahun;
        $kontrak->save();

        return redirect('pegawai/detail/'.$id_pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai,$id_kontrak)
    {
        //
        $kontrak = Kontrak::find($id_kontrak);
        $kontrak->delete();

        return redirect('/pegawai/detail/'.$id_pegawai);
    }
}
