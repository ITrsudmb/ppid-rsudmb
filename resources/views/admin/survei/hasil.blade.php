@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Hasil Survei Pengguna</h3>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                ← Back
            </a>
            <a href="{{ route('admin.survei.download') }}" class="btn btn-success btn-sm">
                Semua
            </a>
        </div>
    </div>

    {{-- ================= FILTER CETAK ================= --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light fw-bold">
            Filter Cetak Data Survei
        </div>

        <div class="card-body">
            <form action="{{ route('admin.survei.download.filter') }}" method="GET" class="row g-3">

                {{-- Pilih Jenis --}}
                <div class="col-md-3">
                    <label class="form-label">Jenis Cetak</label>
                    <select name="tipe" id="tipe" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="harian">Harian</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>

                {{-- TANGGAL --}}
                <div class="col-md-3 d-none" id="fieldTanggal">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                {{-- BULAN --}}
                <div class="col-md-3 d-none" id="fieldBulan">
                    <label class="form-label">Bulan</label>
                    <select name="bulan" class="form-select">
                        @foreach(range(1,12) as $b)
                            <option value="{{ $b }}">{{ DateTime::createFromFormat('!m', $b)->format('F') }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- TAHUN --}}
                <div class="col-md-3 d-none" id="fieldTahun">
                    <label class="form-label">Tahun</label>
                    <select name="tahun" class="form-select">
                        @for($y = now()->year; $y >= now()->year - 5; $y--)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- ================= TABLE ================= --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th>No</th>
                            <th>Nilai</th>
                            <th>Saran</th>
                            <th>Tanggal</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $s)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">{{ $s->nilai }}</span>
                            </td>
                            <td>{{ $s->saran ?? '-' }}</td>
                            <td class="text-center">{{ $s->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.survei.destroy', $s->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada data survei
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- ================= GRAFIK ================= --}}
<div class="row mt-4">

    {{-- GRAFIK HARIAN --}}
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white text-center">
                Grafik Harian
            </div>
            <div class="card-body">
                <canvas id="chartHarian"></canvas>
            </div>
        </div>
    </div>

    {{-- GRAFIK BULANAN --}}
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-warning text-dark text-center">
                Grafik Bulanan
            </div>
            <div class="card-body">
                <canvas id="chartBulanan"></canvas>
            </div>
        </div>
    </div>

    {{-- GRAFIK TAHUNAN --}}
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white text-center">
                Grafik Tahunan
            </div>
            <div class="card-body">
                <canvas id="chartTahunan"></canvas>
            </div>
        </div>
    </div>

</div>
            </div>
        </div>
    </div>

</div>

{{-- ================= SCRIPT FILTER ================= --}}
<script>
    const tipe = document.getElementById('tipe');
    const tgl  = document.getElementById('fieldTanggal');
    const bln  = document.getElementById('fieldBulan');
    const thn  = document.getElementById('fieldTahun');

    tipe.addEventListener('change', function () {
        tgl.classList.add('d-none');
        bln.classList.add('d-none');
        thn.classList.add('d-none');

        if (this.value === 'harian') {
            tgl.classList.remove('d-none');
        }
        if (this.value === 'bulanan') {
            bln.classList.remove('d-none');
            thn.classList.remove('d-none');
        }
        if (this.value === 'tahunan') {
            thn.classList.remove('d-none');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const dataHarian  = @json($harian);
    const dataBulanan = @json($bulanan);
    const dataTahunan = @json($tahunan);

    // ================= HARIAN =================
    const now = new Date();
    const totalHari = new Date(
        now.getFullYear(),
        now.getMonth() + 1,
        0
    ).getDate();

    const labelHarian = Array.from({ length: totalHari }, (_, i) => i + 1);
    const nilaiHarian = labelHarian.map(h => dataHarian[h] ?? 0);

    new Chart(document.getElementById('chartHarian'), {
        type: 'bar',
        data: {
            labels: labelHarian,
            datasets: [{
                label: 'Jumlah Survei',
                data: nilaiHarian,
                backgroundColor: '#0d6efd'
            }]
        },
        options: { responsive: true }
    });

    // ================= BULANAN =================
    const bulanIndo = [
        'Jan','Feb','Mar','Apr','Mei','Jun',
        'Jul','Agt','Sep','Okt','Nov','Des'
    ];

    new Chart(document.getElementById('chartBulanan'), {
        type: 'bar',
        data: {
            labels: bulanIndo,
            datasets: [{
                label: 'Tahun {{ now()->year }}',
                data: bulanIndo.map((_, i) => dataBulanan[i + 1] ?? 0),
                backgroundColor: '#ffc107'
            }]
        },
        options: { responsive: true }
    });

    // ================= TAHUNAN =================
    new Chart(document.getElementById('chartTahunan'), {
        type: 'bar',
        data: {
            labels: bulanIndo,
            datasets: [{
                label: 'Statistik Tahunan',
                data: bulanIndo.map((_, i) => dataTahunan[i + 1] ?? 0),
                backgroundColor: '#0dcaf0'
            }]
        },
        options: { responsive: true }
    });
</script>


@endsection
