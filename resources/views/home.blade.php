@extends('dashboard.dashboard')
<title>Dashboard</title>

@section('content')
    <h1>Jumlah Aset Per Tahun</h1>
    <canvas id="asetChart" width="400" height="200"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var tahun = @json($asetByYear->pluck('tahun'));
        var jumlahAset = @json($asetByYear->pluck('jumlah_aset'));

        var ctx = document.getElementById('asetChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: tahun,
                datasets: [{
                    label: 'Jumlah Aset per Tahun',
                    data: jumlahAset,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
