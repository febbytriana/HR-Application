<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pegawai = \App\Pegawai::all();
        $jumlah_pegawai = count($pegawai);

        $perjalanan = \App\SuratPerjalanan::all();
        $jumlah_perjalanan = count($perjalanan);

        $sp = \App\SuratPeringatan::all();
        $jumlah_sp = count($sp);

        return view('home', compact('jumlah_pegawai','jumlah_perjalanan','jumlah_sp'));
    }
}
