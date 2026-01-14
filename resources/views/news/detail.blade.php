@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl bg-white rounded-xl shadow p-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-4">{{ $news->judul }}</h1>
        <p class="text-gray-500 text-sm mb-6">
            Dipublikasikan pada {{ $news->created_at->translatedFormat('d F Y') }}
        </p>

        @if($news->gambar)
            <img src="{{ asset('storage/' . $news->gambar) }}" 
                 alt="{{ $news->judul }}" 
                 class="w-full rounded-lg mb-6 object-cover">
        @endif

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($news->isi)) !!}
        </div>

        <div class="mt-10">
            <a href="{{ route('beranda') }}" 
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>

<style>
.prose p {
    margin-bottom: 1.25rem;
    line-height: 1.7;
}
.prose img {
    display: block;
    margin: 1.5rem auto;
    max-width: 100%;
    border-radius: 10px;
}
</style>
@endsection
