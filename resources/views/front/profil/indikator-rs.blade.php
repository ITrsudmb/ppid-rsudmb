@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-success mb-3">Indikator Kinerja Rumah Sakit</h2>

  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-success">
      <tr>
        <th>No</th>
        <th>Indikator</th>
        <th>Capaian</th>
        <th>Tahun</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Tingkat Kepuasan Pasien</td>
        <td>94%</td>
        <td>2024</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Rata-rata Waktu Tunggu Rawat Jalan</td>
        <td>18 Menit</td>
        <td>2024</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Tingkat Infeksi Pasca Operasi</td>
        <td>0.2%</td>
        <td>2024</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
