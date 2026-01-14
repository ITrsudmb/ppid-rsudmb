@extends('layouts.app')

@section('content')
<!-- TICKER AGENDA -->
@if($agendas->count() > 0)
<div class="bg-blue-900 text-white py-2 overflow-hidden">
    <div class="whitespace-nowrap animate-marquee">
        @foreach ($agendas as $agenda)
            <span class="inline-block mx-8 font-semibold">
                📌 {{ $agenda->judul }} — {{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('d F Y') }} — {{ $agenda->lokasi ?? '-' }}
            </span>
        @endforeach
    </div>
</div>

<style>
@keyframes marquee {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
.animate-marquee {
  display: inline-block;
  padding-left: 100%;
  animation: marquee 20s linear infinite;
}
</style>
@endif

<!-- AGENDA CARDS -->
<section class="py-14 bg-gray-50 border-y border-gray-200">
    <div class="max-w-4xl mx-auto text-center px-6">

        <h2 class="text-3xl font-bold text-blue-900 mb-8">Agenda Kegiatan</h2>

        @if($agendas->count() == 0)
            <p class="text-gray-600">Belum ada agenda kegiatan saat ini.</p>
        @endif

        <div class="space-y-10">
            @foreach($agendas as $agenda)
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-2xl font-semibold text-blue-800 mb-2">
                        {{ $agenda->judul }}
                    </h3>

                    <p class="text-gray-500 mb-2">
                        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('d F Y') }}
                    </p>

                    @if($agenda->lokasi)
                        <p class="text-gray-500 mb-2">
                            <strong>Lokasi:</strong> {{ $agenda->lokasi }}
                        </p>
                    @endif

                    @if($agenda->keterangan)
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $agenda->keterangan }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
</section>
@endsection
