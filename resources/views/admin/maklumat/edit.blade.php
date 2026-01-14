@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container py-4">

    <h4 class="mb-3">Edit Maklumat</h4>

    <form action="{{ route('admin.maklumat.update', $maklumat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $maklumat->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4" class="form-control" required>{{ $maklumat->keterangan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($maklumat->foto)
                <img src="{{ asset('storage/' . $maklumat->foto) }}" width="80" class="mb-2"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.maklumat.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
