@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        <h2 class="text-3xl font-bold text-blue-700 text-center mb-10">
            Galeri Video RSUD Muara Bengkal
        </h2>

        @if($galleries->count() === 0)
            <p class="text-center text-gray-500">
                Belum ada video untuk ditampilkan.
            </p>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach ($galleries as $gallery)
                @if($gallery->tipe === 'video')
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                        <video controls
                               class="w-full h-56 object-cover bg-black">
                            <source src="{{ asset('storage/'.$gallery->file) }}"
                                    type="video/mp4">
                            Browser tidak mendukung video.
                        </video>

                        <div class="p-4">
                            <p class="text-gray-700 text-sm font-semibold text-center">
                                {{ $gallery->judul ?? 'Tanpa Judul' }}
                            </p>
                        </div>

                    </div>
                @endif
            @endforeach

        </div>

    </div>
</section>

@endsection
