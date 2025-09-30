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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data Harian
        const dailyLabels = @json($daily->pluck('label'));
        const dailyData = @json($daily->pluck('total'));

        new Chart(document.getElementById('dailyChart'), {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'User Terdaftar',
                    data: dailyData,
                    borderColor: 'blue',
                    fill: false
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
            }
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
                    backgroundColor: 'green'
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
            }
        });

        // Data Bulanan
        const monthlyLabels = @json($monthly->pluck('label'));
        const monthlyData = @json($monthly->pluck('total'));

        new Chart(document.getElementById('monthlyChart'), {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'User Terdaftar',
                    data: monthlyData,
                    borderColor: 'orange',
                    fill: false
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
            }
        });
    </script>
@endpush
