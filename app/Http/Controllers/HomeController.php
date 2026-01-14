<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\PageContent;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 berita terbaru
        $berita = News::orderBy('created_at', 'desc')->paginate(6);

        return view('front.beranda', compact('berita'));
    }

    public function dashboard()
{
    return view('admin.dashboard', [
        'totalNews' => News::count(),
        'totalPages' => PageContent::count(),
        'totalGallery' => Gallery::count(),
        'totalAdmin' => User::where('role', 'admin')->count(),
    ]);
}

}
