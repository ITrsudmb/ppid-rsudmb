@extends('layouts.auth')

@section('content')
@include('layouts.message')
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Edit Halaman Website</h2>

        <form method="POST" action="{{ route('admin.pagecontents.update', $halaman->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block font-semibold mb-1">Kategori</label>
                    <input type="text" name="kategori" value="{{ $halaman->kategori }}" class="w-full border-gray-300 rounded p-2" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Sub Kategori</label>
                    <input type="text" name="sub_kategori" value="{{ $halaman->sub_kategori }}" class="w-full border-gray-300 rounded p-2" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="judul" value="{{ $halaman->judul }}" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi Halaman</label>
                <textarea name="isi" rows="6" class="w-full border-gray-300 rounded p-2">{{ $halaman->isi }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-1">Gambar</label>
                @if($halaman->gambar)
                    <img src="{{ asset('storage/'.$halaman->gambar) }}" alt="" class="w-32 mb-3 rounded shadow">
                @endif
                <input type="file" name="gambar" accept="image/*">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.pagecontents.index') }}" class="ml-3 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</div>
@endsection
