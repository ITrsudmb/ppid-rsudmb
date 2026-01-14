@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h2 class="text-3xl font-bold text-center mb-6">
        Grafik Kepuasan Masyarakat
    </h2>

    <canvas id="chartSurvei" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chartSurvei'), {
    type: 'bar',
    data: {
        labels: ['😡','😞','😐','🙂','😍'],
        datasets: [{
            label: 'Jumlah Suara',
            data: [
                {{ $chart->where('nilai',1)->first()->total ?? 0 }},
                {{ $chart->where('nilai',2)->first()->total ?? 0 }},
                {{ $chart->where('nilai',3)->first()->total ?? 0 }},
                {{ $chart->where('nilai',4)->first()->total ?? 0 }},
                {{ $chart->where('nilai',5)->first()->total ?? 0 }},
            ],
            borderWidth: 1
        }]
    }
});
</script>
@endsection
