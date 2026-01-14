@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-success mb-3">Radiologi</h2>
  <p>
    Instalasi Radiologi RSUD Muara Bengkal menyediakan pelayanan pemeriksaan pencitraan
    untuk mendukung diagnosis dokter secara tepat dan cepat.
  </p>

  <div class="row mt-4">
    <div class="col-md-6">
      <img src="{{ asset('images/radiologi_rsud.jpg') }}" alt="Radiologi RSUD" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
      <h5 class="text-success fw-bold">Jenis Layanan:</h5>
      <ul>
        <li>Foto Rontgen (X-Ray)</li>
        <li>USG (Ultrasonografi)</li>
        <li>CT Scan (akan tersedia)</li>
      </ul>
    </div>
  </div>
</div>
@endsection
