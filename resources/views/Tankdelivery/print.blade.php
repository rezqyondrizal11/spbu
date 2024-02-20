<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Halaman</title>
    <style>
        /* CSS khusus untuk tampilan cetak */
        @media print {
            /* Atur gaya yang ingin Anda terapkan saat mencetak */
            body {
                font-size: 12pt;
                margin: 0;
                padding: 0;
            }
            /* Contoh penyesuaian gaya untuk elemen tertentu */
            .container {
                width: 100%;
                margin: 0;
                padding: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Tank Order Delivery</h1>
        <table>
            <thead>
            <tr>
            <th
                                            class=" ">
                                            No</th>
                                        <th
                                            class="">
                                            Delivery Order Number
                                        </th>
                                        <th
                                            class="  ps-2">
                                            Driver ID / Name</th>
                                        <th
                                            class="  ps-2">
                                            Tanker / Vehicle Number</th>

                                        <th
                                            class="">
                                            Supplier / Company
                                        </th>

                                        <th
                                            class="">
                                            Supply Point Name
                                        </th>

                                        <th
                                            class="">
                                            Drop To Tank
                                        </th>

                                        <th
                                            class="">
                                            D.O Volume
                                        </th>
                                        <th
                                            class="">
                                            Created By
                                        </th>
                                        <th
                                            class="">
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
        <!-- Tambahkan konten lain yang ingin Anda cetak di sini -->
    </div>
</body>
<script>
 
            window.print(); // Memanggil fungsi print bawaan dari browser
   
    </script>
</html>
