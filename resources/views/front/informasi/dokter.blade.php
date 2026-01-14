@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Judul --}}
        <h1 class="text-3xl font-bold text-[#0A6847] mb-10 text-center">
            Daftar Dokter RSUD Muara Bengkal
        </h1>

        {{-- Grid Dokter --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse($dokter as $d)
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">

                {{-- Foto Dokter --}}
                <img src="{{ $d->foto 
                        ? asset('storage/'.$d->foto) 
                        : asset('images/default-dokter.png') }}"
                     class="h-40 w-40 object-cover rounded-full mx-auto mb-4 shadow"
                     alt="{{ $d->nama }}">

                {{-- Nama --}}
                <h3 class="font-bold text-xl text-[#0A6847]">
                    {{ $d->nama }}
                </h3>

                {{-- Spesialis / Umum --}}
                <p class="text-gray-600 mb-2">
                    @if($d->jenis === 'spesialis')
                        Dokter Spesialis {{ $d->spesialis }}
                    @else
                        Dokter Umum
                    @endif
                </p>

                {{-- Jadwal --}}
                <div class="mt-3 text-sm text-gray-500">
                    @if($d->jadwalPoli->count())
                        @foreach($d->jadwalPoli as $jadwal)
                            <p>
                                {{ $jadwal->hari }}
                                ({{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }})
                            </p>
                        @endforeach
                    @else
                        <p>Tidak ada jadwal</p>
                    @endif
                </div>

            </div>
            @empty
                <p class="col-span-3 text-center text-gray-600">
                    Belum ada data dokter tersedia.
                </p>
            @endforelse

        </div>

    </div>
</section>
@endsection
