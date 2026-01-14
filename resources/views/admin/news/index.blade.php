@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow">
        {{-- 🔹 Judul Halaman --}}
        <h2 class="text-3xl font-bold text-blue-700 mb-3 text-center md:text-left">
            Berita & Informasi
        </h2>

        {{-- 🔹 Tombol Navigasi --}}
        <div class="mb-8 flex flex-col md:flex-row items-center justify-between gap-3">
            <a href="{{ route('admin.dashboard') }}" 
               class="inline-block bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg shadow hover:bg-gray-300 transition">
                ← Kembali
            </a>

            <a href="{{ route('admin.news.create') }}" 
               class="inline-block bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition">
               + Tambah Berita
            </a>
        </div>

        {{-- 🔹 Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-6 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- 🔹 Tabel Berita --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">Judul</th>
                        <th class="py-3 px-4 text-left font-semibold">Tanggal</th>
                        <th class="py-3 px-4 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($news as $n)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $n->judul }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $n->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.news.edit', $n->id) }}" class="text-blue-600 hover:underline mx-2">
                                    Edit
                                </a>
                                <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-6">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 🔹 Pagination --}}
        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection
