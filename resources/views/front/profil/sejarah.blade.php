@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">
            {{ $page->judul }}
        </h1>

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {{-- Ganti baris ini --}}
            {!! preg_replace('/src="(?!http)([^"]+)"/', 'src="' . asset('storage') . '/$1"', $page->isi) !!}
        </div>
    </div>
</section>

<style>
/* Gambar di dalam konten */
.prose img {
  max-width: 100%;
  height: auto;
  display: block;
  margin: 20px 0; /* jarak atas-bawah */
  border-radius: 8px; /* opsional, biar lebih rapi */
}

/* Paragraf di dalam konten */
.prose p {
  margin-bottom: 1.5em; /* jarak antar paragraf */
}

/* Margin untuk judul gambar jika ada caption */
.prose figure {
  margin-bottom: 1.5em;
}
</style>
@endsection
