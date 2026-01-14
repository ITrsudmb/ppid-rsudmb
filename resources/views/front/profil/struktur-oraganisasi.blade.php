@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-success mb-3">Struktur Organisasi</h2>
  <p>
    Struktur organisasi RSUD Muara Bengkal disusun untuk mendukung efektivitas dan efisiensi pelayanan
    dengan pembagian tugas yang jelas antara unit pelayanan medis, penunjang, dan administrasi.
  </p>

  <div class="text-center mt-4">
    <img src="{{ asset('images/struktur_rsud.png') }}" alt="Struktur Organisasi" class="img-fluid border rounded shadow-sm">
  </div>
</div>
@endsection
