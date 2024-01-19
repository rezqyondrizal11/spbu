@extends('layout.main')
@section('title', 'Tank Order Delivery')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <h6 class="text-white text-capitalize">@yield('title')</h6>
                                <a href="{{ route('tankdelivery.create') }}" class="btn btn-success">
                                    Create
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
