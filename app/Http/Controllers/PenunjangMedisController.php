<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenunjangMedisController extends Controller
{
    public function farmasi()
    {
        return view('penunjang.farmasi');
    }

    public function laboratorium()
    {
        return view('penunjang.laboratorium');
    }

    public function radiologi()
    {
        return view('penunjang.radiologi');
    }

    public function fisioterapi()
    {
        return view('penunjang.fisioterapi');
    }
}
