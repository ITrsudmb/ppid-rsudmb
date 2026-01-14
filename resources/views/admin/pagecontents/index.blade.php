@extends('layouts.auth')

@section('content')
@include('layouts.message')
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">

        <!-- Header + Tombol Kembali -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-blue-700">Kelola Halaman Website Publik</h2>

            <!-- Tombol Kembali -->
            <a href="{{ route('admin.dashboard') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                ← Kembali
            </a>
        </div>

        <!-- Tombol Tambah -->
        <a href="{{ route('admin.pagecontents.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
            + Tambah Halaman
        </a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-50 text-left">
                    <th class="p-3 border-b">Kategori</th>
                    <th class="p-3 border-b">Sub Kategori</th>
                    <th class="p-3 border-b">Judul</th>
                    <th class="p-3 border-b">Gambar</th>
                    <th class="p-3 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ ucfirst($page->kategori) }}</td>
                    <td class="p-3">{{ ucfirst($page->sub_kategori) }}</td>
                    <td class="p-3">{{ $page->judul }}</td>
                    <td class="p-3">
                        @if($page->gambar)
                            <img src="{{ asset('storage/'.$page->gambar) }}" class="w-24 rounded shadow">
                        @else
                            <span class="text-gray-400 italic">-</span>
                        @endif
                    </td>
                    <td class="p-3">
                        <a href="{{ route('admin.pagecontents.edit', $page->id) }}" 
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('admin.pagecontents.destroy', $page->id) }}" 
                              method="POST"
                              class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus halaman ini?')" 
                                    class="text-red-600 hover:underline ml-2">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
