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

            th,
            td {
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
        <h1>Report Liters</h1>
        <table class="table">
            <thead>
                <tr>
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
                    {{-- <th class="text-secondary opacity-7"></th> --}}
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
        <!-- Tambahkan konten lain yang ingin Anda cetak di sini -->
    </div>
</body>
<script>
    window.print(); // Memanggil fungsi print bawaan dari browser
</script>

</html>
