@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container py-4">

    <h4 class="mb-3">Edit Data Dokter</h4>

    <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Dokter</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="umum" {{ $dokter->jenis=='umum' ? 'selected':'' }}>Dokter Umum</option>
                <option value="spesialis" {{ $dokter->jenis=='spesialis' ? 'selected':'' }}>Dokter Spesialis</option>
            </select>
        </div>

        <div class="mb-3" id="spesialis_box" style="{{ $dokter->jenis=='spesialis' ? '' : 'display:none;' }}">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" value="{{ $dokter->spesialis }}">
        </div>

        <div class="mb-3">
            <label>Foto Dokter</label><br>
            @if($dokter->foto)
                <img src="{{ asset('storage/' . $dokter->foto) }}" width="80" class="mb-2"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<script>
document.getElementById('jenis').addEventListener('change', function() {
    document.getElementById('spesialis_box').style.display =
        (this.value === 'spesialis') ? 'block' : 'none';
});
</script>

@endsection
