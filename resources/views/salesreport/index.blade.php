@extends('layout.main')
@section('title', 'Sales Today')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <h6 class="text-white text-capitalize">@yield('title')</h6>
                                <a href="{{ route('salesreport.create') }}" class="btn btn-success">
                                    Penjualan Hari ini
                                </a>
                                {{-- <button class="btn btn-success">Create</button> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created By
                                        </th>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Time</th>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            name</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Liters sold
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Revenue
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
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
                                                <a href="{{ route('salesreport.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Update
                                                </a>
                                                <a href="{{ route('salesreport.destroy', ['id' => $row->id]) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Delete
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="align-middle text-center">Total Revenue :</td>
                                        <td class="align-middle text-center">{{ number_format($total) }}</td>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
