<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pendidikan;
use App\Sertifikat;
use App\Jabatan;
use App\NoDarurat;
use App\Keluarga;
use App\Kontrak;
use App\PengalamanKerja;
use App\Pelatihan;
use App\TempPegawai;
use DB;
use Illuminate\Http\Request;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
 
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $pegawai = \App\Pegawai::all();
        $jabatan = \App\Jabatan::all();
        $keluarga = \App\Keluarga::all();
       
        return view('pegawais.pegawai', compact('pegawai','jabatan','keluarga'));
    }

     /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = \App\Jabatan::all();
        return view('pegawais.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req)
    {
        $pegawai = new Pegawai;
        $pegawai->nik = $req->nik;
        $pegawai->nama = $req->nama;
        $pegawai->id_jabatan = $req->id_jabatan;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->alamat = $req->alamat;
        $pegawai->jk = $req->jk;
        $pegawai->agama = $req->agama;
        $pegawai->warga_negara = $req->warga_negara;
        $pegawai->status_kawin = $req->status_kawin;
        $pegawai->goldar = $req->goldar;
        $pegawai->penyakit = $req->penyakit;
        $pegawai->telp = $req->telp;
        $pegawai->email = $req->email;
        $file       = $req->file('image');
        $fileName   = $file->getClientOriginalName();
        $req->file('image')->move("upload/", $fileName);
        $pegawai->image = $fileName;

        $pegawai->save();

        session()->flash('success-create', 'Data Pegawai '.$req->nama.' telah disimpan');

        return redirect('/pegawai/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai) ?? abort(404);
        $jabatan = Jabatan::all();
        return view('pegawais/edit',compact('pegawai','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai) ?? abort(404);

        $pegawai->nik = $req->nik;
        $pegawai->nama = $req->nama;
        $pegawai->id_jabatan = $req->id_jabatan;
        $pegawai->tempat = $req->tempat;
        $pegawai->tgl = $req->tgl;
        $pegawai->alamat = $req->alamat;
        $pegawai->jk = $req->jk;
        $pegawai->agama = $req->agama;
        $pegawai->warga_negara = $req->warga_negara;
        $pegawai->status_kawin = $req->status_kawin;
        $pegawai->goldar = $req->goldar;
        $pegawai->penyakit = $req->penyakit;
        $pegawai->telp = $req->telp;
        $pegawai->email = $req->email;
    
        if($req->hasfile('image')){
            $file       = $req->file('image');
            $fileName   = $file->getClientOriginalName();
            $req->file('image')->move("upload/", $fileName);
            $pegawai->image = $fileName;
        }

        $pegawai->save();

        session()->flash('success-create', 'Data Akun berhasil diedit');
           
        return redirect('/pegawai/index');

    }       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai) ?? abort(404);
        $pegawai->delete();
 
        session()->flash('success-create', 'Data Pegawai '.$pegawai->nama.' telah dihapus');

        return redirect('/pegawai/index');
    }

    public function detail($id_pegawai)
    {
        $pegawai = Pegawai::where('id_pegawai','=',$id_pegawai)->get() ?? abort(404);
        if(count($pegawai) > 0) {
        $pegawais = Pegawai::find($id_pegawai); 
        $keluarga = Keluarga::where('id_pegawai',$id_pegawai)->get();
        $hitunganak = Keluarga::where([['id_pegawai',$id_pegawai],['status','=','Anak']])->get();
        $hitungsuami = Keluarga::where([['id_pegawai',$id_pegawai],['status','=','Suami']])->get();

        $hitungistri = Keluarga::where([['id_pegawai',$id_pegawai],['status','=','Istri']])->get();
        $hitungortu = Keluarga::where([['id_pegawai',$id_pegawai],['status','=','Ayah']])->get();
        $keluarga = \App\Keluarga::all();
        $pendidikan = Pendidikan::where('id_pegawai',$id_pegawai)->first();
        $no_darurat = NoDarurat::where('id_pegawai',$id_pegawai)->get();
        $sertifikat = Sertifikat::where('id_pegawai',$id_pegawai)->get();
        $kontrak = Kontrak::where('id_pegawai',$id_pegawai)->get();
        $pengalaman = PengalamanKerja::where('id_pegawai',$id_pegawai)->get();
        $jabatan = Jabatan::all();
        $pelatihan = Pelatihan::where('id_pegawai',$id_pegawai)->get();

         return view('pegawais/detail',compact('pegawai','keluarga','hitunganak','hitungsuami','hitungistri','hitungortu','pegawais','pendidikan','no_darurat','sertifikat','kontrak','pengalaman','jabatan','pelatihan'));
        } else {
            abort(404);
        }

    }

       

    public function updateJabatan(Request $req,$id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai) ?? abort(404);
        $pegawai->id_jabatan = $req->id_jabatan;
        $pegawai->save();
    }

    public function export_excel()
	{
		return Excel::download(new PegawaiExport, 'pegawai.xlsx');
	}

    //Akses Pegawai
    public function profile($id_pegawai)
    {
        $pegawai = Pegawai::where('id_user',$id_pegawai)->first() ?? abort(404);
        $jabatan = Jabatan::all();
        $checktemp = TempPegawai::where('id_pegawai',$pegawai->id_pegawai)->count();
        return view('pegawais.profile',compact('pegawai','jabatan','checktemp'));
    }

}
