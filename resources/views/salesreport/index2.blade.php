@extends('layout.main')
@section('title', 'Report Sales')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <h6 class="text-white text-capitalize">@yield('title')</h6>

                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="row p-0  position-relative mt-n4 mx-3 z-index-2 pt-6 ">
                            <div class="col-3">
               
                            <a href="{{ route('salesreport.print') }}"  class="btn btn-success" >
                                Print
                            </a>
                            </div>
                            <div class="col-md-9 ">
                                <form action="{{ route('salesreport.report') }}" method="GET" class="mb-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" class="form-control" name="start_date"
                                                    id="start_date">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" class="form-control" name="end_date" id="end_date">
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                            Date
                                        </th>
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
                                                {{ date('d-M-Y', strtotime($row->created_at)) }}</td>


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
