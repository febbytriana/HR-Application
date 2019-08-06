<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

class SPController extends Controller
{
	 public function index()
    {
        $surat_peringatan = \App\SuratPeringatan::all();
        $pegawai = \App\Pegawai::all();

        return view('surat-sp.index', compact('surat_peringatan','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = \App\Pegawai::all();

        return view('surat-sp.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pegawai = \App\SuratPeringatan::create($req->all());

        return redirect('surat-sp/index');
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
    public function edit($id_sp)
    {
        $sp = \App\SuratPeringatan::find($id_sp);
        $pegawai = \App\Pegawai::all();

        return view('surat-sp.edit', compact('sp','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_sp)
    {
        $sp = \App\SuratPeringatan::find($id_sp);
        $sp->update($req->all());

        return redirect('surat-sp/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = \App\SuratPeringatan::find($id_sp);
        $sp->delete($sp);

        return redirect(surat-sp/index);
    }

    public function cetak_pdf()
    {
        $surat_peringatan = DB::table('surat_peringatans')
            ->join('pegawais', 'surat_peringatans.id_pegawai', '=', 'pegawais.id_pegawai')
            ->select('pegawais.*', 'surat_peringatans.*')
            ->get();
 
    	$pdf = PDF::loadview('surat-sp/cetak_pdf',compact('surat_peringatan'));
    	return $pdf->stream();
    }
    public function cetak_pdf_id($id_sp)
    {
        $surat_peringatan = \App\SuratPeringatan::find($id_sp);
        $surat = \App\SuratPeringatan::where('id_sp','=',$id_sp)->get();
 
    	$pdf = PDF::loadview('surat-sp/cetak_pdf_id',compact('surat_peringatan','surat'));
    	return $pdf->stream();
    }

}
