@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-success mb-3">Fisioterapi</h2>
  <p>
    Instalasi Fisioterapi RSUD Muara Bengkal melayani pasien yang membutuhkan terapi fisik
    untuk pemulihan fungsi tubuh akibat cedera, stroke, atau gangguan muskuloskeletal.
  </p>

  <div class="row mt-4">
    <div class="col-md-6">
      <h5 class="text-success fw-bold">Jenis Terapi yang Tersedia:</h5>
      <ul>
        <li>Terapi panas dan dingin</li>
        <li>Terapi listrik (TENS)</li>
        <li>Terapi latihan gerak (exercise therapy)</li>
        <li>Rehabilitasi pasca-stroke</li>
      </ul>
    </div>
    <div class="col-md-6">
      <img src="{{ asset('images/fisioterapi_rsud.jpg') }}" alt="Fisioterapi RSUD" class="img-fluid rounded shadow-sm">
    </div>
  </div>
</div>
@endsection
