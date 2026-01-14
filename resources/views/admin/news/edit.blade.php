@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Edit Berita</h2>

        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="judul" value="{{ $news->judul }}" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi</label>
                <textarea name="isi" rows="6" class="w-full border-gray-300 rounded p-2" required>{{ $news->isi }}</textarea>
            </div>

            @if($news->gambar)
                <div class="mb-4">
                    <p class="font-semibold mb-1">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/'.$news->gambar) }}" class="w-64 rounded shadow mb-2">
                </div>
            @endif

            <div class="mb-4">
                <label class="block font-semibold mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('admin.news.index') }}" class="ml-3 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</div>
@endsection
