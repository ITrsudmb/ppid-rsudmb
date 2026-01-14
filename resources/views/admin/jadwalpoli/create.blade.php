@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container mx-auto p-6 max-w-xl bg-white rounded-xl shadow-md">

    <h2 class="text-xl font-bold mb-4">Tambah Jadwal Poli</h2>

    <form action="{{ route('admin.jadwalpoli.store') }}" method="POST">
        @csrf

        <label class="font-semibold">Nama Poli</label>
        <input type="text" name="poli" class="w-full border p-2 mb-3 rounded">

        <label class="font-semibold">Nama Dokter</label>
        <select name="dokter_id" class="w-full border p-2 mb-3 rounded">
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama }}</option>
            @endforeach
        </select>

        <label class="font-semibold">Hari</label>
        <input type="text" name="hari" class="w-full border p-2 mb-3 rounded">

        <label class="font-semibold">Jam Mulai</label>
        <input type="time" name="jam_mulai" class="w-full border p-2 mb-3 rounded">

        <label class="font-semibold">Jam Selesai</label>
        <input type="time" name="jam_selesai" class="w-full border p-2 mb-3 rounded">

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700 transition">
            Simpan
        </button>
    </form>
</div>
@endsection
