@extends('layout.main')
@section('title', 'Tank')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <h6 class="text-white text-capitalize">@yield('title')</h6>
                                <a href="{{ route('tank.create') }}" class="btn btn-success">
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
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Grade</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Number</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Description</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Physical Label</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Capacity
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diameter</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tank Type</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle text-center">{{ $row->name }}</td>
                                            <td class="align-middle text-center">{{ $row->grade->name }}</td>
                                            <td class="align-middle text-center">{{ $row->number }}</td>
                                            <td class="align-middle text-center">{{ $row->desc }}</td>
                                            <td class="align-middle text-center">{{ $row->label }}</td>
                                            <td class="align-middle text-center">{{ $row->capacity }}</td>
                                            <td class="align-middle text-center">{{ $row->diameter }}</td>
                                            <td class="align-middle text-center">{{ $row->type->name }}</td>

                                            <td class="align-middle text-center">
                                                <a href="{{ route('tank.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Update
                                                </a>
                                                <a href="{{ route('tank.destroy', ['id' => $row->id]) }}"
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
