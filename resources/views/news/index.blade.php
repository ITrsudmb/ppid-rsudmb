@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">
            Berita & Informasi Terkini
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($news as $item)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden flex flex-col">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-full h-48 object-cover">
                    @endif

                    <div class="p-5 text-left flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-lg text-blue-700 mb-2">
                                {{ Str::limit($item->judul, 60) }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                        </div>

                        <div class="mt-auto pt-3">
                            <a href="{{ route('berita.detail', $item) }}" 
                               class="inline-block text-blue-600 font-semibold hover:text-blue-800 hover:underline transition">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">Belum ada berita tersedia.</p>
            @endforelse
        </div>

        <div class="mt-10 flex justify-center">
            {{ $news->links('pagination::tailwind') }}
        </div>
    </div>
</section>
@endsection
