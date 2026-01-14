@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Visi & Misi</h1>

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! $content->isi ?? '<p>Visi dan Misi rumah sakit belum tersedia. Silakan perbarui di dashboard admin.</p>' !!}
        </div>
    </div>
</section>
@endsection
