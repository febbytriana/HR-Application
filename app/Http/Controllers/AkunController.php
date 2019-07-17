<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pegawai;

use Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $akuns = User::all();
          $pegawais = Pegawai::all();
        return view('akuns/index', compact('akuns','pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = User::all();
        $pegawai = Pegawai::all();
         return view('akuns/create', compact('akun','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
           $akun = new User;
           $akun->name = $nama;
           $akun->email = $req->email;
           $akun->password = Hash::make($req->password);
           $akun->status = $req->status;
           $akun->save();

            if ($req->status == "Pegawai") {
            $akun_id = User::select('id')->whereRaw('id_user = (select max(`id`) from users)')->first();

            $pegawai = Pegawai::find($req->id);
            $pegawai->id_user = $akun_id['id'];
            $pegawai->save();
        } elseif ($req->id_level == 3) {
         

           session()->flash('success-create', 'Data Akun berhasil disimpan');
           return redirect('/akun/index');
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
    public function edit($id)
    {
        $id = Auth::user()->id;
        $akun = User::find($id);
        $pegawai = Pegawai::all();
        return view('akuns/edit', compact('akun','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateakun(Request $req)
    {
        $akun = User::find($req->id);
        $passold = $akun->password;
        if ($req->password != $req->password1) {
            session()->flash('failed-create', 'Password tidak sama');
            return redirect()->back();
        } else{
            $akun->password = Hash::make($req->password);
            $akun->save();
            session()->flash('success-create', 'Password berhasil diubah');
            return redirect()->back();
        }
    }
    public function update(Request $req)
    {
       $akun = User::find($req->id);   
        $akun->name = $req->name;
        $akun->email = $req->email;
        $akun->password = Hash::make($req->password);
        $akun->status = $req->status;
  
        $akun->save();

        return redirect('/akun/index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = User::find($id);
        $akun->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }
}
