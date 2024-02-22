@extends('layout.print')
@section('title', 'Report Liters')

@section('content')
    <div class="row justify-content-center">

        <table class="table table-bordered">


            <thead>

                <tr style="color: #000000;">
                    <th class=" ">
                        No</th>

                    <th class=" ">
                        name</th>

                    <th class="">
                        Capacity
                    </th>
                    <th class="">
                        Start Capacity
                    </th>
                    <th class="">
                        Current Capacity
                    </th>
                    <th class="">
                        Date
                    </th>

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
                            {{ date('d-M-Y', strtotime($row->created_at)) }}</td>



                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>



@endsection
