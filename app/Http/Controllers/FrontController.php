<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Dokter;
use App\Models\Maklumat;
use App\Models\JadwalPoli;
use Illuminate\Support\Str;



class FrontController extends Controller
{
    // ==========================
    // ======== BERANDA =========
    // ==========================
    public function index()
    {
    // Ambil 6 berita terbaru dari tabel news
    $berita = News::orderBy('created_at', 'desc')->paginate(6);

    // Ambil 5 berita terpopuler berdasarkan views
    $populer = News::orderBy('views', 'desc')->limit(5)->get();
    // Tambahkan Agenda
    // $agenda = Agenda::orderBy('tanggal', 'asc')->limit(5)->get();
    $dokter = Dokter::all();   // struktur: nama, poli, foto, jadwal
    $agenda = Agenda::all();   // untuk marquee
    $maklumat = Maklumat::latest()->take(3)->get();
    $jadwal = JadwalPoli::with('dokter')->get();

    return view('front.beranda', compact('berita', 'populer', 'agenda', 'dokter', 'maklumat','jadwal'));
    }

    // ==========================
    // ======== PROFIL ==========
    // ==========================
    public function sejarah()
    {
        $page = PageContent::where('kategori','profil')
            ->where('sub_kategori','sejarah')
            ->first();

        return view('front.page', compact('page'));
    }

    public function visiMisi()
    {
        $page = PageContent::where('kategori','profil')
            ->where('sub_kategori','visi-misi')
            ->first();

        return view('front.page', compact('page'));
    }

    public function struktur()
    {
        $page = PageContent::where('kategori','profil')
            ->where('sub_kategori','struktur-organisasi')
            ->first();

        return view('front.page', compact('page'));
    }

    public function prestasi()
    {
        $page = PageContent::where('kategori','profil')
            ->where('sub_kategori','prestasi-indikator')
            ->first();

        return view('front.page', compact('page'));
    }

    // ==========================
    // ===== LAYANAN MEDIS =====
    // ==========================
    public function igd()
    {
        $page = PageContent::where('kategori','layanan')
            ->where('sub_kategori','igd')
            ->first();

        return view('front.page', compact('page'));
    }
    
    public function rawatJalan()
    {
        $page = PageContent::where('kategori','layanan')
        ->where('sub_kategori','rawat-jalan')
        ->first();
        
        return view('front.page', compact('page'));
    }
    
    public function mcu()
    {
        $page = PageContent::where('kategori','layanan')
        ->where('sub_kategori','mcu')
        ->first();
        
        return view('front.page', compact('page'));
    }
    public function rawatinap()
    {
        $page = PageContent::where('kategori','layanan')
            ->where('sub_kategori','rawat-inap')
            ->first();

        return view('front.page', compact('page'));
    }
    
    // ==========================
    // === PENUNJANG MEDIS =====
    // ==========================
    public function farmasi()
    {
        $page = PageContent::where('kategori','penunjang')
            ->where('sub_kategori','farmasi')
            ->first();

        return view('front.page', compact('page'));
    }

    public function laboratorium()
    {
        $page = PageContent::where('kategori','penunjang')
            ->where('sub_kategori','laboratorium')
            ->first();

        return view('front.page', compact('page'));
    }

    public function radiologi()
    {
        $page = PageContent::where('kategori','penunjang')
            ->where('sub_kategori','radiologi')
            ->first();

        return view('front.page', compact('page'));
    }

    public function fisioterapi()
    {
        $page = PageContent::where('kategori','penunjang')
            ->where('sub_kategori','fisioterapi')
            ->first();

        return view('front.page', compact('page'));
    }

    // ==========================
    // ======== INFORMASI =======
    // ==========================
    public function jadwalPoli()
    {
    $page = PageContent::where('kategori','informasi')
        ->where('sub_kategori','jadwal-poli')
        ->first();

    $jadwal = JadwalPoli::with('dokter')->get();

    return view('front.informasi.jadwal_poli', compact('page', 'jadwal'));
    }
    public function maklumat() {
            // Ambil data maklumat terakhir atau sesuai kebutuhan
    $maklumat = Maklumat::latest()->first(); 

    return view('front.informasi.maklumat', compact('maklumat'));
    }

    public function dokter()
    {
        $dokter = Dokter::with('jadwalPoli')->get();
        return view('front.informasi.dokter', compact('dokter'));
    }

    public function agenda() {
    // Ambil semua agenda, urut berdasarkan tanggal
    $agendas = Agenda::orderBy('tanggal', 'asc')->get();

    return view('front.informasi.agenda', compact('agendas'));
    }
    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('front.informasi.gallery', compact('galleries'));
    }

        public function pengaduan()
    {
        $page = PageContent::where('kategori','informasi')
            ->where('sub_kategori','pengaduan')
            ->first();

        return view('front.page', compact('page'));
    }

        public function pendaftaranonline()
    {
        $page = PageContent::where('kategori','informasi')
            ->where('sub_kategori','pendaftaran-online')
            ->first();

        return view('front.page', compact('page'));
    }

        public function hakpasien()
    {
        $page = PageContent::where('kategori','informasi')
            ->where('sub_kategori','hak-pasien')
            ->first();

        return view('front.page', compact('page'));
    }

public function galleryVideo()
{
    $galleries = Gallery::where('tipe', 'video')
        ->latest()
        ->get();

    return view('front.informasi.galleryv', compact('galleries'));
}


}
