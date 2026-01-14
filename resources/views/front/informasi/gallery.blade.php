@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        <h2 class="text-3xl font-bold text-blue-700 text-center mb-10">
            Galeri RSUD Muara Bengkal
        </h2>

        @if($galleries->count() === 0)
            <p class="text-center text-gray-500">
                Belum ada galeri untuk ditampilkan.
            </p>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($galleries as $gallery)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    {{-- PREVIEW --}}
                    @if($gallery->tipe === 'image')
                        <img src="{{ asset('storage/'.$gallery->file) }}"
                             alt="{{ $gallery->judul }}"
                             class="w-full h-48 object-cover">
                    @else
                        <video controls
                               class="w-full h-48 object-cover bg-black">
                            <source src="{{ asset('storage/'.$gallery->file) }}">
                        </video>
                    @endif

                    {{-- JUDUL --}}
                    <div class="p-4">
                        <p class="text-gray-700 text-sm font-semibold text-center">
                            {{ $gallery->judul ?? 'Tanpa Judul' }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
