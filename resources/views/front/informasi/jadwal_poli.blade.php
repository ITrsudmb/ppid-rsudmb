@extends('layouts.app')

@section('content')

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Jadwal Pelayanan Poli</h1>

        @if(isset($jadwal) && count($jadwal) > 0)
            <div class="overflow-x-auto bg-gray-50 p-4 rounded-lg shadow">
                <table class="min-w-full border border-gray-200 text-left text-gray-700">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama Poli</th>
                            <th class="py-2 px-4 border">Dokter</th>
                            <th class="py-2 px-4 border">Hari</th>
                            <th class="py-2 px-4 border">Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $i => $poli)
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="py-2 px-4 border">{{ $i+1 }}</td>
                                <td class="py-2 px-4 border">{{ $poli->poli }}</td>
                                <td class="py-2 px-4 border">{{ $poli->dokter->nama ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $poli->hari }}</td>
                                <td class="py-2 px-4 border">{{ $poli->jam_mulai }} - {{ $poli->jam_selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-600">Jadwal pelayanan poli belum tersedia.</p>
        @endif
    </div>
</section>

@endsection
