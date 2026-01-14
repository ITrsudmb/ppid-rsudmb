@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container py-4">

    <h4 class="mb-3">Tambah Maklumat</h4>

    <form action="{{ route('admin.maklumat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.maklumat.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
