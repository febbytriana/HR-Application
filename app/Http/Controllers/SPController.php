<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPController extends Controller
{
    public function create()
    {
        return view('surat-sp.create');
    }
}
