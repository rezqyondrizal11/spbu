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
        <h1>Laporan Penjualan</h1>
        <table>
            <thead>
            <tr>
                                        <th
                                            class=" ">
                                            No</th>
                                        <th
                                            class="">
                                            Created By
                                        </th>
                                        <th
                                            class="  ">
                                            Time</th>
                                        <th
                                            class="  ">
                                            name</th>

                                        <th
                                            class="">
                                            Liters sold
                                        </th>

                                        <th
                                            class="">
                                            Price
                                        </th>
                                        <th
                                            class="">
                                            Revenue
                                        </th>
                                        <th
                                            class="">
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
                                <tfoot>
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
                                </tfoot>
        </table>
        <!-- Tambahkan konten lain yang ingin Anda cetak di sini -->
    </div>
</body>
<script>
 
            window.print(); // Memanggil fungsi print bawaan dari browser
   
    </script>
</html>
