@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-3">
            <h2 class="text-2xl font-bold text-blue-700">
                Kelola Galeri
            </h2>

            <div class="flex gap-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    ← Kembali
                </a>

                <a href="{{ route('admin.gallery.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Upload Galeri
                </a>
            </div>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            @forelse($galleries as $gallery)
                <div class="bg-gray-50 rounded shadow overflow-hidden">

                    {{-- Preview --}}
                    @if($gallery->tipe === 'image')
                        <img src="{{ asset('storage/'.$gallery->file) }}"
                             class="w-full h-40 object-cover">
                    @else
                        <video controls
                               class="w-full h-40 object-cover bg-black">
                            <source src="{{ asset('storage/'.$gallery->file) }}">
                        </video>
                    @endif

                    {{-- Info --}}
                    <div class="p-3 text-center">
                        <p class="text-sm text-gray-700 mb-2">
                            {{ $gallery->judul ?? 'Tanpa Judul' }}
                        </p>

                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus file ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:underline text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">
                    Belum ada data galeri.
                </p>
            @endforelse

        </div>
    </div>
</div>
@endsection
