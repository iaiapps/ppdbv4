@extends('layouts.dashboard')

@section('title', 'Statistik Pendaftaran')

@section('content')
    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 min-vh-100">
        <div class="container-fluid">
            <div class="row">
                <!-- Chart Harian -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Pendaftaran Harian</div>
                        <div class="card-body">
                            <canvas id="dailyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Chart Mingguan -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">Pendaftaran Mingguan</div>
                        <div class="card-body">
                            <canvas id="weeklyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Chart Bulanan -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-warning text-dark">Pendaftaran Bulanan</div>
                        <div class="card-body">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .ba {
            background-color: rgba(24, 245, 12, 0.7) rgb(70, 176, 70) rgb(23, 143, 87) rgb(255, 193, 5)
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>

    <script>
        // Data Harian
        const dailyLabels = @json($daily->pluck('label'));
        const dailyData = @json($daily->pluck('total'));

        new Chart(document.getElementById('dailyChart'), {
            type: 'bar',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'User Terdaftar',
                    data: dailyData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    maxBarThickness: 40
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            // tampilkan bilangan bulat
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    datalabels: {
                        align: 'top', // posisi di atas titik/bar
                        anchor: 'center', // tempel di ujung
                        color: 'black',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function(value) {
                            return value; // tampilkan angkanya langsung
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        });

        // Data Mingguan
        const weeklyLabels = @json($weekly->pluck('label'));
        const weeklyData = @json($weekly->pluck('total'));

        new Chart(document.getElementById('weeklyChart'), {
            type: 'bar',
            data: {
                labels: weeklyLabels,
                datasets: [{
                    label: 'User Terdaftar',
                    data: weeklyData,
                    backgroundColor: 'rgba(23, 143, 87, 0.7)',
                    borderColor: 'rgba(23, 143, 87, 1)',
                    borderWidth: 2,
                    maxBarThickness: 40
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            // tampilkan bilangan bulat
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    datalabels: {
                        align: 'top', // posisi di atas titik/bar
                        anchor: 'center', // tempel di ujung
                        color: 'black',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function(value) {
                            return value; // tampilkan angkanya langsung
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Data Bulanan
        const monthlyLabels = @json($monthly->pluck('label'));
        const monthlyData = @json($monthly->pluck('total'));

        new Chart(document.getElementById('monthlyChart'), {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'User Terdaftar',
                    data: monthlyData,
                    backgroundColor: 'rgba(255, 193, 5, 0.7)',
                    borderColor: 'rgba(255, 193, 5, 1)',
                    borderWidth: 2,
                    maxBarThickness: 40
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            // tampilkan bilangan bulat
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                datalabels: {
                    align: 'top', // posisi di atas titik/bar
                    anchor: 'center', // tempel di ujung
                    color: 'black',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value; // tampilkan angkanya langsung
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>
@endpush
