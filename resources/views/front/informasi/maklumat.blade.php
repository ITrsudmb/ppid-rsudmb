@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h1 class="text-3xl font-bold text-[#0A6847] mb-6">
            {{ $maklumat->judul ?? 'Maklumat Pelayanan' }}
        </h1>

        <p class="text-gray-700 leading-relaxed text-lg">
            {!! $maklumat->keterangan ?? 'Belum ada konten maklumat pelayanan.' !!}
        </p>

        @if($maklumat->foto)
            <img src="{{ asset('storage/'.$maklumat->foto) }}"
                 class="mx-auto mt-10 rounded-xl shadow-lg w-96"
                 alt="{{ $maklumat->judul }}">
        @else
            <img src="{{ asset('images/maklumat.png') }}"
                 class="mx-auto mt-10 rounded-xl shadow-lg w-96"
                 alt="Maklumat">
        @endif

    </div>
</section>
@endsection
