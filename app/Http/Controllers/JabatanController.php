<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function jabatan()
    {
        $jabatan = \App\Jabatan::orderBy('jabatan','asc')->get();
        return view('jabatan.index', compact('jabatan'));
    }
    public function create()
    {
        return view('jabatan.create');
    }
    public function store(Request $req)
    {
        \App\Jabatan::create($req->all());

        return redirect('/jabatan/index');
    }
    public function edit(Request $req,$id_jabatan)
    {
       $jabatan = \App\Jabatan::find($id_jabatan);
       return view('jabatan/edit', compact('jabatan'));
    }
    public function update(Request $req,$id_jabatan)
    {
        $jabatan = \App\Jabatan::find($id_jabatan);
        $jabatan->update($req->all());
        return redirect('/jabatan/index');
    }
    public function destroy($id_jabatan)
    {
        $jabatan = \App\Jabatan::find($id_jabatan);
        $jabatan->delete($jabatan);
        return redirect('/jabatan/index');
    }
}
