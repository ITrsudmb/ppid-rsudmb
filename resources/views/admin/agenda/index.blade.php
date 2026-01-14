@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">

        <!-- Tombol Kembali -->
        <a href="{{ route('admin.dashboard') }}"
            class="inline-flex items-center gap-2 bg-gray-700 text-white px-3 py-1.5 text-sm rounded-md hover:bg-gray-800 transition mb-4">
            ⟵ Kembali
        </a>

        <!-- Header & Tombol Tambah -->
        <div class="flex justify-between items-center mb-8 mt-2">
            <h2 class="text-2xl font-bold text-gray-800 pr-6">Daftar Agenda</h2>

            <a href="{{ route('admin.agenda.create') }}"
                class="bg-blue-600 text-white px-4 py-2 text-sm rounded-lg shadow hover:bg-blue-700 transition w-auto">
                + Tambah Agenda
            </a>
        </div>

        {{-- <!-- Notifikasi -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        <!-- Tabel -->
        <div class="overflow-hidden rounded-lg shadow">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-50 text-gray-700 font-semibold">
                    <tr>
                        <th class="p-3 border-b">Judul</th>
                        <th class="p-3 border-b">Tanggal</th>
                        <th class="p-3 border-b">Lokasi</th>
                        <th class="p-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($agenda as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border-b">{{ $item->judul }}</td>
                            <td class="p-3 border-b">{{ $item->tanggal }}</td>
                            <td class="p-3 border-b">{{ $item->lokasi }}</td>
                            <td class="p-3 border-b text-center">

                                <a href="{{ route('admin.agenda.edit', $item->id) }}"
                                    class="text-blue-600 hover:underline px-2">Edit</a>

                                <form action="{{ route('admin.agenda.destroy', $item->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Hapus agenda ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline px-2">Hapus</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Belum ada agenda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $agenda->links('pagination::tailwind') }}
        </div>

    </div>
</div>
@endsection
