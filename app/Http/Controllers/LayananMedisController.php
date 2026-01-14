<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananMedisController extends Controller
{
    public function igd()
    {
        return view('layanan.igd');
    }

    public function rawatJalan()
    {
        return view('layanan.rawat-jalan');
    }

    public function mcu()
    {
        return view('layanan.mcu');
    }
    public function rawatinap()
    {
        return view('layanan.rawat-inap');
    }
}
