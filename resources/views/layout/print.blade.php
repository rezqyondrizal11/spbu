<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template') }}/assets/img/logo-pertamina.png">
    <link rel="icon" type="image/png" href="{{ asset('template') }}/assets/img/logo-pertamina.png">
    <title>
        Operasional SPBU 13251510 | @yield('title')
    </title>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('template1') }}/assets/css/pages/login/classic/login-2.css " rel="stylesheet"
        type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('template1') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <style>
        .help-block {
            color: red;
        }

        body {
            -webkit-print-color-adjust: exact !important;
        }

        @media print {

            .print-table-merahmuda td,
            .print-table-merahmuda th {
                background-color: #FFA8A8 !important;
            }

            .table tr.print-table-ijo>td.ijo {
                background-color: #B6FFCE !important;
            }

            .print-table-hijau td,
            .print-table-hijau th {
                background-color: #B6FFCE !important;
            }

            .print-table-kuning td,
            .print-table-kuning th {
                background-color: #F6FFA4 !important;
            }

        }
    </style>


</head>

<body>
    <div class="container">

        <div class="card card-custom ">
            <div class="card-body">
                <!-- begin: Invoice-->

                <div class="row">
                    <div class="col-8">

                        <img src="{{ asset('template') }}/assets/img/pertamina.png" width="160px">


                    </div>

                    <div class="col-4">
                        <div class="">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5">

                            </a>
                            <!--end::Logo-->
                            <span class="d-flex flex-column" style="text-align: right;">

                                <span class="font-weight-boldest" style="color:#000;">SPBU 13-251510</span>
                                <span class="opacity-70" style="font-size: 10px;">Jl. Raya Ampang No.88</span>






                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <div class="pt-10 ">
                            <h6 class="font-weight-boldest mb-10 "> @yield('title')
                                <span>
                                    <h6 class="text-muted ">
                                        @if ($start != 0)
                                            <?php
                                            echo $start . ' Till ' . $end; ?>
                                        @else
                                            <?php
                                            echo date('d-M-Y'); ?>
                                        @endif


                                    </h6>
                                </span>

                            </h6>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
                <br><br>
                <div class="row ">

                    <div class="col-4">
                        <div class="symbol card-label">

                        </div>
                    </div>
                    <div class="col-4 text-center">

                    </div>
                    <div class="col-4 text-right">
                        <div class="symbol card-label">

                            <div class="font-weight-bold" style="padding-bottom:40px;"><strong>Penanggung jawab</strong>
                            </div>
                            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                            <div class="font-weight-bold pr-10"><strong>Pengawas</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

</body>
<script>
    window.print();
</script>

</html>
