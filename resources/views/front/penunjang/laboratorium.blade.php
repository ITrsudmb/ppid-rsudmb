@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-success mb-3">Laboratorium</h2>
  <p>
    Laboratorium RSUD Muara Bengkal melayani pemeriksaan penunjang diagnostik dengan hasil yang cepat dan akurat.
  </p>

  <div class="row mt-4">
    <div class="col-md-6">
      <h5 class="text-success fw-bold">Jenis Pemeriksaan:</h5>
      <ul>
        <li>Hematologi</li>
        <li>Kimia Klinik</li>
        <li>Urinalisis</li>
        <li>Mikrobiologi</li>
      </ul>
    </div>
    <div class="col-md-6">
      <img src="{{ asset('images/lab_rsud.jpg') }}" alt="Laboratorium RSUD" class="img-fluid rounded shadow-sm">
    </div>
  </div>
</div>
@endsection
