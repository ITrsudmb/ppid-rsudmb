@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container py-4">

    <h4 class="mb-3">Tambah Dokter</h4>

    <form action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Dokter</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="umum">Dokter Umum</option>
                <option value="spesialis">Dokter Spesialis</option>
            </select>
        </div>

        <div class="mb-3" id="spesialis_box" style="display:none;">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto Dokter</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
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
