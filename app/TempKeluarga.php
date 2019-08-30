<?php
namespace App\Http\Controllers;
use App\TempKeluarga;
use App\Keluarga;
use Illuminate\Http\Request;
class TempKeluarga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluargas = TempKeluarga::all();
        $pegawais = TempPegawai::all();
        return view('keluargas/index', compact('keluargas','pegawais'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pegawai = TempPegawai::all(); 
         return view('keluargas/create',compact('pegawai'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $keluargas = new TempKeluarga;
        $keluargas->id_pegawai = $req->id_pegawai;
        $keluargas->nama = $req->nama;
        $keluargas->status = $req->status;
        $keluargas->save();
        return redirect('/keluargas/index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TempKeluarga  $tempKeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(TempKeluarga $tempKeluarga)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempKeluarga  $tempKeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluarga = TempKeluarga::find($id);
        $pegawai = TempPegawai::all();
        return view('keluargas/edit', compact('keluarga','pegawai'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempKeluarga  $tempKeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $keluarga = TempKeluarga::find($req->id);
        $keluarga->id_pegawai = $req->id_pegawai;
        $keluarga->nama = $req->nama;
        $keluarga->status = $req->status;
        $keluarga->save();
        return redirect('/keluarga/index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempKeluarga  $tempKeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluarga = TempKeluarga::find($id);
        $keluarga->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }
}