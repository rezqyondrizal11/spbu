@extends('layout.print')
@section('title', 'Laporan Tank Order Delivery')

@section('content')
    <div class="row justify-content-center">

        <table class="table table-bordered">


            <thead>

                <tr style="color: #000000;">


                    <th class=" ">
                        No</th>
                    <th class="">
                        Delivery Order Number
                    </th>
                    <th class="  ps-2">
                        Driver ID / Name</th>
                    <th class="  ps-2">
                        Tanker / Vehicle Number</th>

                    <th class="">
                        Supplier / Company
                    </th>

                    <th class="">
                        Supply Point Name
                    </th>

                    <th class="">
                        Drop To Tank
                    </th>

                    <th class="">
                        D.O Volume
                    </th>
                    <th class="">
                        Created By
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

@endsection
