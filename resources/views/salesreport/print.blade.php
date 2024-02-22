@extends('layout.print')
@section('title', 'Laporan Penjualan')

@section('content')
    <div class="row justify-content-center">

        <table class="table table-bordered">


            <thead>

                <tr style="color: #000000;">

                    <th class=" ">
                        No</th>
                    <th class="">
                        Created By
                    </th>
                    <th class="  ">
                        Time</th>
                    <th class="  ">
                        name</th>

                    <th class="">
                        Liters sold
                    </th>

                    <th class="">
                        Price
                    </th>
                    <th class="">
                        Revenue
                    </th>
                    <th class="">
                        Date
                    </th>

                </tr>

            </thead>

            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($data as $row)
                    @php
                        $total += $row->harga * $row->kapasitas;
                    @endphp
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center">{{ $row->user->name }}</td>
                        <td class="align-middle text-center">
                            {{ $row->jam_awal . ' - ' . $row->jam_akhir }}</td>

                        <td class="align-middle text-center">{{ $row->tankreport->tank->name }}</td>

                        <td class="align-middle text-center">{{ number_format($row->kapasitas) }}</td>
                        <td class="align-middle text-center">{{ number_format($row->harga) }}</td>
                        <td class="align-middle text-center">
                            {{ number_format($row->harga * $row->kapasitas) }}</td>

                        <td class="align-middle text-center">
                            {{ date('d-M-Y', strtotime($row->created_at)) }}</td>


                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    <div class="row justify-content-center">
        <div class="col-12 row">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="col-12 row">
                    <table>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="align-middle text-center">Total Revenue :</td>
                                <td class="align-middle text-center">{{ number_format($total) }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
