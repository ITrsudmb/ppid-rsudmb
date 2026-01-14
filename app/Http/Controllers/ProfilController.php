<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('profil.sejarah');
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function struktur()
    {
        return view('profil.struktur-organisasi');
    }

    public function prestasi()
    {
        return view('profil.prestasi');
    }

    public function indikator()
    {
        return view('profil.indikator-rs');
    }
}
