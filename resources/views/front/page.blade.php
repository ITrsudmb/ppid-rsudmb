@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        {{-- Judul --}}
        <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-12 text-center">
            {{ $page->judul ?? 'Data tidak ditemukan' }}
        </h1>

        {{-- Konten Flex --}}
        <div class="md:flex md:items-start md:space-x-10">

            {{-- 🔹 Kolom Kiri: Gambar --}}
            @if($page && $page->gambar)
            <div class="md:w-1/3 shrink-0 mb-8 md:mb-0">
                <img src="{{ asset('storage/'.$page->gambar) }}" 
                     alt="{{ $page->judul }}"
                     class="rounded-xl shadow-lg w-full object-cover">
            </div>
            @endif

            {{-- 🔹 Kolom Kanan: Deskripsi --}}
            <div class="md:w-2/3 text-gray-700 leading-relaxed prose max-w-none">
                {!! $page->isi ?? 'Tidak ada konten untuk ditampilkan.' !!}
            </div>

        </div>
    </div>
</section>

<style>
.prose img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px 0;
}
.prose p {
    margin-bottom: 1.2em;
}
@media (max-width: 768px) {
    .md\:flex {
        display: block !important;
    }
}
</style>
@endsection
