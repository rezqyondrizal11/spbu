@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <style>
        /* Gaya CSS untuk custom-badge-label */
        .custom-badge-label {
            display: inline-block;
            padding: 5px;
            margin-right: 10px;
            font-weight: bold;
            color: white;
            border-radius: 5px;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Coverage Day Summary</h5>
                <div class=" mt-2">
                    <div class="row col-2">
                        <span class="custom-badge-label text-center" style="background-color:  rgba(255, 99, 132, 0.8);">
                            CAPACITY</span>
                    </div>
                    <div class="row col-2">
                        <span class="custom-badge-label text-center"
                            style="background-color:rgba(54, 162, 235, 0.8);">CURRENT
                            CAPACITY</span>
                    </div>

                </div>
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
            var formattedStok = tank.kapasitas_stok.toLocaleString();
            var formattedCapacity = tank.tank.capacity.toLocaleString();
            var persentaseStok = (tank.kapasitas_stok / tank.tank.capacity) * 100;
            var persentaseCapacity = 100 - persentaseStok; // Menambahkan persentase kapasitas

            // Konfigurasi chart untuk masing-masing tank
            var config = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [tank.tank.capacity, tank.kapasitas_stok],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                        ],
                        hoverOffset: 4
                    }],
                    labels: [persentase.toFixed(2) + '%', persentaseCapacity.toFixed(2) + '%']
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
                            text: formattedStok + 'L / ' + formattedCapacity + 'L'
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
