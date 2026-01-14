@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Instalasi Farmasi</h1>

        <div class="flex flex-col md:flex-row gap-8">
            @if(!empty($content->gambar))
                <div class="md:w-1/3">
                    <img src="{{ asset('storage/'.$content->gambar) }}" alt="Farmasi" class="rounded-lg shadow-md w-full object-cover">
                </div>
            @endif

            <div class="md:w-2/3 prose text-gray-700 leading-relaxed">
                {!! $content->isi ?? '<p>Informasi mengenai instalasi farmasi belum tersedia.</p>' !!}
            </div>
        </div>
    </div>
</section>
@endsection
