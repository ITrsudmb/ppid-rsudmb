@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-6">
    @if($page)
        <h1 class="text-3xl font-bold text-blue-700 mb-10 text-center">{{ $page->judul }}</h1>

        <div class="flex flex-col md:flex-row md:items-start md:gap-10">
            {{-- 🔹 Gambar di kiri --}}
            @if($page->gambar)
                <div class="md:shrink-0 mb-6 md:mb-0">
                    <img src="{{ asset('storage/'.$page->gambar) }}" 
                         alt="{{ $page->judul }}" 
                         class="rounded-xl shadow-lg w-full max-w-sm object-cover">
                </div>
            @endif

            {{-- 🔹 Deskripsi di kanan --}}
            <div class="text-gray-700 leading-relaxed flex-1">
                <div class="prose max-w-none">
                    {!! nl2br(e($page->isi)) !!}
                </div>
            </div>
        </div>

    @else
        <p class="text-gray-500 italic text-center">Konten belum tersedia. Silakan hubungi admin.</p>
    @endif
</div>
@endsection
