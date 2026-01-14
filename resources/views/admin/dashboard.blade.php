@extends('layouts.auth')

@section('content')
@include('layouts.message')

<style>
    .fade-in { animation: fadeIn 0.8s ease forwards; opacity: 0; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .card-animate { transition: 0.25s ease; }
    .card-animate:hover { transform: translateY(-6px) scale(1.03); }
    .btn-mini {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(255,255,255,0.25);
        backdrop-filter: blur(6px);
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 12px;
        transition: 0.2s;
    }
    .btn-mini:hover { background: rgba(255,255,255,0.45); }
</style>

<div class="min-h-screen bg-linear-to-b from-blue-50 to-gray-100 flex items-center justify-center py-10">
    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-6xl fade-in">

        <h1 class="text-4xl font-bold text-blue-700 mb-2 text-center">
            Dashboard Admin Rumah Sakit
        </h1>
        <p class="text-gray-600 text-center mb-10">
            Selamat datang di panel admin RSUD.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <!-- Kelola Halaman -->
            <div class="relative">
                <a href="{{ route('admin.pagecontents.index') }}" 
                   class="card-animate bg-blue-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-file-alt text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Kelola Halaman</div>
                </a>
                <a href="{{ route('admin.pagecontents.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Kelola Gambar -->
            <div class="relative">
                <a href="{{ route('admin.gallery.index') }}" 
                   class="relative card-animate bg-green-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <div class="absolute inset-0 opacity-25">
                        <img src="{{ asset('images/dashboard/gallery-bg.jpg') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="relative z-10">
                        <i class="fas fa-image text-3xl mb-2"></i>
                        <div class="font-semibold text-lg">Kelola Gambar</div>
                    </div>
                </a>
                <a href="{{ route('admin.gallery.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Berita & Informasi -->
            <div class="relative">
                <a href="{{ route('admin.news.index') }}" 
                   class="card-animate bg-indigo-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-newspaper text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Berita & Informasi</div>
                </a>
                <a href="{{ route('admin.news.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Agenda -->
            <div class="relative">
                <a href="{{ route('admin.agenda.index') }}" 
                   class="card-animate bg-yellow-500 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-calendar-alt text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Agenda RS</div>
                </a>
                <a href="{{ route('admin.agenda.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Jadwal Poli -->
            <div class="relative">
                <a href="{{ route('admin.jadwalpoli.index') }}" 
                   class="card-animate bg-teal-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-clock text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Jadwal Poli</div>
                </a>
                <a href="{{ route('admin.jadwalpoli.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Data Dokter -->
            <div class="relative">
                <a href="{{ route('admin.dokter.index') }}" 
                   class="card-animate bg-purple-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-user-md text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Data Dokter</div>
                </a>
                <a href="{{ route('admin.dokter.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Maklumat -->
            <div class="relative">
                <a href="{{ route('admin.maklumat.index') }}" 
                   class="card-animate bg-orange-600 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-bullhorn text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Maklumat</div>
                </a>
                <a href="{{ route('admin.maklumat.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>

            <!-- Tombol Download Pengaduan & Survei -->
            <div class="relative">
                <a href="{{ route('admin.survei.hasil') }}" 
                class="card-animate bg-gray-700 text-white p-6 rounded-xl text-center shadow-md block">
                    <i class="fas fa-folder-download text-3xl mb-2"></i>
                    <div class="font-semibold text-lg">Data Survei</div>
                </a>

                <a href="{{ route('admin.survei.download') }}" class="btn-mini text-black">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
