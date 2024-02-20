@extends('layout.main')
@section('title', 'Report Tank Order Delivery')

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
               
                                <a href="{{ route('tankdelivery.print') }}"  class="btn btn-success" >
                                    Print
                                </a>
                            </div>
                            <div class="col-md-9 ">
                                <form action="{{ route('tankdelivery.report') }}" method="GET" class="mb-4">
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
                                            Delivery Order Number
                                        </th>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Driver ID / Name</th>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanker / Vehicle Number</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Supplier / Company
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Supply Point Name
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Drop To Tank
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            D.O Volume
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created By
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date
                                        </th>
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle text-center">{{ $row->id_don }}</td>
                                            <td class="align-middle text-center"> {{ $row->driver }}</td>
                                            <td class="align-middle text-center">{{ $row->vehicle_number }}</td>
                                            <td class="align-middle text-center">{{ $row->supplier->name }}</td>
                                            <td class="align-middle text-center">{{ $row->supply->name }}</td>
                                            <td class="align-middle text-center">{{ $row->tank->name }}</td>
                                            <td class="align-middle text-center">{{ $row->do_volume }}</td>
                                            <td class="align-middle text-center">{{ $row->user->name }}</td>
                                            <td class="align-middle text-center">
                                                {{ date('d-M-Y', strtotime($row->created_at)) }}</td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
