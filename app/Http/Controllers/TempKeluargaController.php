<?php

namespace App\Http\Controllers;

use App\TempKeluarga;
use App\Keluarga;  
use App\Pegawai;
use DB;                                      

use Illuminate\Http\Request;

class TempKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempkeluargas = TempKeluarga::all();
        $keluargas = Keluarga::all();

        return view('keluargas/index', compact('tempkeluargas','keluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tempkeluarga = TempKeluarga::all(); 
         return view('keluargas/create',compact('tempkeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $tempkeluargas = new TempKeluarga;
        $tempkeluargas->id_keluarga = $req->id_keluarga;
        $tempkeluargas->nama = $req->nama;
        $tempkeluargas->status = $req->status;

        $tempkeluargas->save();
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
    public function edit($id_temp_keluarga)
    {
        $tempkeluarga = TempKeluarga::find($id_temp_keluarga);
        $keluarga = Keluargas::all();
        return view('keluargas/edit', compact('tempkeluarga','keluarga'));
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
        $tempkeluarga = TempKeluarga::find($req->id_temp_keluarga);
        $tempkeluarga->id_keluarga = $req->id_keluarga;
        $tempkeluarga->nama = $req->nama;
        $tempkeluarga->status = $req->status;

        $tempkeluarga->save();

        return redirect('/keluarga/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempKeluarga  $tempKeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_temp_keluarga)
    {
        $tempkeluarga = TempKeluarga::find($id_temp_keluarga);
        $tempkeluarga->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }

    public function ortu($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $ortu = DB::table('keluargas')
            ->where('id_pegawai', $id_pegawai)
            ->where(function ($query) {
                $query->where('status', '=', 'Ayah')
                      ->orWhere('status', '=', 'Ibu');
            })
            ->get();

        return view('keluargas.index',compact('ortu','pegawai'));
    }
}
