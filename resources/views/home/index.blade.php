@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Coverage Day Summary</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    @if ($tanks->count() != 0)
                        @foreach ($tanks as $tank)
                            <div class="col-3">
                                <div class="chart-container">
                                    <div class="text-center font-weight-bold">
                                        {{ $tank->tank->name }}
                                    </div>

                                    <canvas id="tankChart_{{ $loop->index }}"></canvas>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>Data Empty (Input Tank Today First)</h3>
                    @endif

                </div>



            </div>
        </div>
    </div>
    <!-- Menggunakan CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel@1.0.0"></script> --}}
    <script>
        // Ambil data dari PHP dan konversi menjadi format yang diperlukan oleh Chart.js
        var tankData = @json($tanks);

        // Siapkan data untuk chart
        tankData.forEach(function(tank, index) {
            var sisaKapasitas = tank.kapasitas_stok;
            var persentase = (sisaKapasitas / tank.tank.capacity) * 100;

            // Konfigurasi chart untuk masing-masing tank
            var config = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [tank.kapasitas_stok, tank.tank.capacity],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                        ],
                        hoverOffset: 4
                    }],
                    labels: [persentase.toFixed(2) + '%', '']
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: tank.tank.capacity + ' / ' + tank.kapasitas_stok
                        },
                        // subtitle: {
                        //     display: true,
                        //     text: 'Liters'
                        // },

                    }
                }
            };

            // Ambil elemen canvas dan inisialisasi chart
            var ctx = document.getElementById('tankChart_' + index).getContext('2d');
            new Chart(ctx, config);
        });
    </script>



@endsection
