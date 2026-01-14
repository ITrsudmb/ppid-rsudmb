@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">Edit Agenda</h2>

        <a href="{{ route('admin.agenda.index') }}" class="text-blue-600">← Kembali</a>

        <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="font-semibold">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" 
                       value="{{ $agenda->judul }}" required>
            </div>

            <div class="mb-3">
                <label class="font-semibold">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border p-2 rounded"
                       value="{{ $agenda->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label class="font-semibold">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border p-2 rounded"
                       value="{{ $agenda->lokasi }}">
            </div>

            <div class="mb-3">
                <label class="font-semibold">Keterangan</label>
                <textarea name="keterangan" class="w-full border p-2 rounded">
                    {{ $agenda->keterangan }}
                </textarea>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>

    </div>
</div>
@endsection
