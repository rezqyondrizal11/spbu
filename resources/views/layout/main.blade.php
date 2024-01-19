@php
    use Illuminate\Support\Facades\Route;

    $currentRoute = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template') }}/assets/img/logo-pertamina.png">
    <link rel="icon" type="image/png" href="{{ asset('template') }}/assets/img/logo-pertamina.png">
    <title>
        Operasional SPBU 13251510 | @yield('title')
    </title>
    @include('layout.css')

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layout.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('title')</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
                </nav>

            </div>
        </nav>
        @yield('content')
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="" class="font-weight-bold" target="_blank">Habib BTW
                            </a>
                            for a better web.
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </main>

    @include('layout.script')

</body>

</html>
