<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_perjalanan = \App\SuratPerjalanan::all();
        $pegawai = \App\Pegawai::all();

        return view('perjalanans.index', compact('surat_perjalanan','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = \App\Pegawai::all();

        return view('perjalanans.create',compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        \App\SuratPerjalanan::create($req->all());

        return redirect('perjalanan');
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
    public function edit($id_surat)
    {
        $surat_perjalanan = \App\SuratPerjalanan::find($id_surat);
        $pegawai = \App\Pegawai::all();

        return view('perjalanans.edit', compact('surat_perjalanan','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_surat)
    {
        $surat_perjalanan = \App\SuratPerjalanan::find($id_surat);
        $surat_perjalanan->update($req->all());

        return redirect('perjalanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_surat)
    {
        $surat_perjalanan = \App\SuratPerjalanan::find($id_surat);
        $surat_perjalanan->delete($surat_perjalanan);
        
        return redirect('perjalanan');
    }
    public function cetak_pdf()
    {
        $surat_perjalanan = DB::table('surat_perjalanans')
            ->join('pegawais', 'surat_perjalanans.id_pegawai', '=', 'pegawais.id_pegawai')
            ->select('pegawais.*', 'surat_perjalanans.*')
            ->get();
 
    	$pdf = PDF::loadview('perjalanans/surat_perjalanan_pdf',compact('surat_perjalanan'));
    	return $pdf->stream();
    }
    public function cetak_pdf_id($id_surat)
    {
        $surat_perjalanan = \App\SuratPerjalanan::find($id_surat);
        $surat = \App\SuratPerjalanan::where('id_surat','=',$id_surat)->get();
 
    	$pdf = PDF::loadview('perjalanans/surat_perjalanan_id_pdf',compact('surat_perjalanan','surat'));
    	return $pdf->stream();
    }
}
