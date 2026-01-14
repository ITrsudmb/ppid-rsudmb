@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container py-4">

    <a href="{{ route('admin.dashboard') }}" 
       class="btn btn-secondary mb-3">⟵ Kembali </a>

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Maklumat</h4>
        <a href="{{ route('admin.maklumat.create') }}" class="btn btn-primary">+ Tambah Maklumat</a>
    </div>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ Str::limit($item->keterangan, 70) }}</td>
                <td>
                    @if($item->file)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="60">
                    @else
                        <small>Tidak ada</small>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.maklumat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.maklumat.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Belum ada data maklumat</td></tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
