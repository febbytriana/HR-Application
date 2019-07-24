<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        
        return view('jabatans/index',compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jataban = Jabatan::all();

        return view('jabatans/create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $jabatan = new Jabatan;
        $jabatan->jabatan = $req->jabatan;
        $jabatan->gaji_pokok = $req->gaji_pokok;

        $jabatan->save();
        return redirect('/jabatan/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);

        return view('jabatans/edit',compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $jabatan = Jabaatan::find($req->id_jabatan);
        $jabatan->jabatan = $req->jabatan;
        $jabatan->gaji_pokok = $req->gaji_pokok;

        $jabatan->save();
        return redirect('/jabatan/index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        $jabatan->delete();

        return redirect()->back();
    }
}
