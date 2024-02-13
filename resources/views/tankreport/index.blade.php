@extends('layout.main')
@section('title', 'Tank Today')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <h6 class="text-white text-capitalize">@yield('title')</h6>
                                <a href="{{ route('tankreport.create') }}" class="btn btn-success">
                                    Isi tank Hari Ini
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
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            name</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Capacity
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Start Capacity
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Current Capacity
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle text-center">{{ $row->tank->name }}</td>
                                            <td class="align-middle text-center">{{ $row->tank->capacity }}</td>
                                            <td class="align-middle text-center">{{ $row->kapasitas_awal }}</td>
                                            <td class="align-middle text-center">{{ $row->kapasitas_stok }}</td>

                                            <td class="align-middle text-center">
                                                <a href="{{ route('tankreport.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Update
                                                </a>
                                                <a href="{{ route('tankreport.destroy', ['id' => $row->id]) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Delete
                                                </a>
                                            </td>


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
