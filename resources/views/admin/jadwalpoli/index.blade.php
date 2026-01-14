@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">

        <a href="{{ route('admin.dashboard') }}"
            class="inline-flex items-center gap-2 bg-gray-700 text-white px-3 py-1.5 text-sm rounded-md hover:bg-gray-800 transition mb-4">
            ⟵ Kembali
        </a>

        <div class="flex justify-between items-center mb-6 mt-2">
            <h2 class="text-2xl font-bold text-gray-800">Data Jadwal Poli</h2>
            <a href="{{ route('admin.jadwalpoli.create') }}"
                class="bg-blue-600 text-white px-4 py-2 text-sm rounded-lg shadow hover:bg-blue-700 transition">
                + Tambah Jadwal
            </a>
        </div>

        <div class="overflow-hidden rounded-lg shadow">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-50 text-gray-700 font-semibold">
                    <tr>
                        <th class="p-3 border-b">Poli</th>
                        <th class="p-3 border-b">Dokter</th>
                        <th class="p-3 border-b">Hari</th>
                        <th class="p-3 border-b">Jam Mulai</th>
                        <th class="p-3 border-b">Jam Selesai</th>
                        <th class="p-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border-b">{{ $item->poli }}</td>

                        <td class="p-3 border-b">
                            {{ $item->dokter->nama ?? '-' }}
                        </td>

                        <td class="p-3 border-b">{{ $item->hari }}</td>
                        <td class="p-3 border-b">{{ $item->jam_mulai }}</td>
                        <td class="p-3 border-b">{{ $item->jam_selesai }}</td>

                        <td class="p-3 border-b text-center">
                            <a href="{{ route('admin.jadwalpoli.edit', $item->id) }}"
                               class="text-blue-600 hover:underline px-2">Edit</a>

                            <form action="{{ route('admin.jadwalpoli.destroy', $item->id) }}"
                                method="POST" class="inline-block"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline px-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Belum ada jadwal.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
