<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('home');
        }

    }
}
