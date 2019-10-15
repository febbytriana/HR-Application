<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
       
        if(Auth::user()->status == "Pegawai") {
            return view('homepegawai');
        }elseif(Auth::user()->status == "HR" || Auth::user()->status == "Admin") {
             $pegawai = \App\Pegawai::all();
            $jumlah_pegawai = count($pegawai);

            $perjalanan = \App\SuratPerjalanan::all();
            $jumlah_perjalanan = count($perjalanan);

            $sp = \App\SuratPeringatan::all();
            $jumlah_sp = count($sp);
        
            $pegawai = DB::table('pegawais')->get();

            return view('home', compact('jumlah_pegawai','jumlah_perjalanan','jumlah_sp','pegawai'));
        }

    }
}
